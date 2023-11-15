<?php

declare(strict_types=1);

$url = "https://core.telegram.org/bots/api";

$dom = new \DOMDocument();

@$dom->loadHTML(mb_convert_encoding(file_get_contents($url), 'HTML-ENTITIES', 'UTF-8'));
$xpath = new \DOMXPath($dom);

/*
// find all h3/a elements
$items = $xpath->query("//h3[text() = 'Available methods']/following-sibling::h4");

foreach ($items as $item) {
    echo $item->textContent.PHP_EOL;
}*/

$items = $xpath->query("//div[@id='dev_page_content']/*");

$methodsFound = false;

$methods = [];

class Parameter {
    public string $name;
    public string $type;
    public string $description;
    public string $required;
}

class Method {
    public string $name;
    public string $description;
    public string $returnType;
    public array $parameters;
}

$method = null;

$methodData = [];

foreach ($items as $item) {

    if ($methodsFound &&
        $item->tagName === 'h3'
        && $item->textContent === 'Updating messages') {
        break;
    }

    if ($item->tagName === 'h3'
    && $item->textContent === 'Available methods') {
        $methodsFound = true;
    }

    if ($methodsFound) {
        if ($item->tagName === 'h4' && count($methodData) === 0) {
            $methodData[] = $item->textContent;
            echo "Method: $item->textContent".PHP_EOL;
        }

        if ($item->tagName === 'h4' && count($methodData) === 2) {

            $method = new Method();
            $method->name = $methodData[0];
            $method->description = $methodData[1];
            $method->parameters = [];
            $methods[] = $method;

            $methodData = [];

            $methodData[] = $item->textContent;
            echo "Method: $item->textContent".PHP_EOL;
        }

        if ($item->tagName === 'h4' && count($methodData) === 3) {

            $method = new Method();
            $method->name = $methodData[0];
            $method->description = $methodData[1];

            foreach ($methodData[2] as $parameterData) {
                $parameter = new Parameter();
                $parameter->name = $parameterData[0];
                $parameter->type = $parameterData[1];
                $parameter->required = $parameterData[2];
                $parameter->description = $parameterData[3];
                $method->parameters[] = $parameter;
            }

            $methods[] = $method;

            $methodData = [];

            $methodData[] = $item->textContent;
            echo "  Method: $item->textContent".PHP_EOL;
        }

        if ($item->tagName === 'p' && count($methodData) === 1) {
            $methodData[] = $item->textContent;
            echo "  Description: $item->textContent".PHP_EOL;
        }

        if ($item->tagName === 'table' && count($methodData) === 2) {
            $trs = $xpath->query("tbody/tr", $item);

            $parameters = [];
            foreach ($trs as $tr) {
                $parameter = [];
                $parameter[] = $xpath->query("td[1]", $tr)->item(0)->textContent;
                $parameter[] = $xpath->query("td[2]", $tr)->item(0)->textContent;
                $parameter[] = $xpath->query("td[3]", $tr)->item(0)->textContent;
                $parameter[] = $xpath->query("td[4]", $tr)->item(0)->textContent;
                echo "  Parameter: {$parameter[0]} type: {$parameter[1]} required: {$parameter[2]}".PHP_EOL;
                $parameters[] = $parameter;
            }

            $methodData[] = $parameters;
        }
    }

    $typeMap = [
        'String' => 'string',
        'Integer' => 'int',
        'Float' => 'float',
        'Boolean' => 'bool',
        'True' => 'bool',
        'Array' => 'array',
    ];

    foreach ($methods as $method) {
        $className = ucfirst($method->name);
        $params = [];
        $createMethodStr = "    public static function create(";
        $createMethodParams = [];
        $allParams = [];
        foreach ($method->parameters as $parameter) {
            $type = $parameter->type;
            $descArray = str_split($parameter->description, 70);
            $commentArray = [];
            $commentArray[] = "/**";
            foreach ($descArray as $desc) {
                $commentArray[] = " * $desc";
            }


            $types = [];
            if (str_contains($type, ' or ')) {
                $types = explode(' or ', $type);
            } elseif (str_starts_with($type, 'Array of ')) {
                $types = explode('Array of ', $type);
                $arrCount = count($types) - 1;
                $unknownType = end($types);

                $noAndTypes = [$unknownType];
                if (str_contains($unknownType, ' and ')) {
                    $noAndTypes = explode(' and ', $unknownType);
                }


                $noAndCommaTypes = [];
                foreach ($noAndTypes as $noAndType) {
                    if (str_contains($noAndType, ', ')) {
                        $noCommaType = explode(', ', $noAndType);
                        $noAndCommaTypes = array_merge($noAndCommaTypes, $noCommaType);
                    } else {
                        $noAndCommaTypes[] = $noAndType;
                    }
                }

                $types = $noAndCommaTypes;

                $mappedType = $typeMap[$type] ?? $type;
                $commentArray[] = " * @var $mappedType".str_repeat('[]', $arrCount);
                $types = ['Array'];
            } else {
                $types = [$type];
            }

            $commentArray[] = ' */';
            $mappedTypes = [];

            foreach ($types as $type) {
                if (isset($typeMap[$type])) {
                    $mappedTypes[] = $typeMap[$type];
                } else {
                    $mappedTypes[] = $type;
                }
            }

            // check mapped types for complex strings

            $opt = ($parameter->required === 'Optional');

            $prefix = '';

            if ($opt) {
                if (count($mappedTypes) > 1) {
                    array_unshift($mappedTypes, 'null');
                } else {
                    $prefix = '?';
                }
            }

            $mappedTypesStr = implode('|', $mappedTypes);

            foreach ($commentArray as $key => $comment) {
                $commentArray[$key] = "    $comment";
            }

            $camelCaseParamName = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $parameter->name))));
            if (!$opt) {
                $createMethodParams[$parameter->name] = [$mappedTypesStr, $camelCaseParamName];
            }
            $allParams[$parameter->name] = [$mappedTypesStr, $camelCaseParamName];

            $params[] = implode(PHP_EOL, $commentArray).PHP_EOL;
            $params[] = "    protected $prefix$mappedTypesStr \$$parameter->name;".PHP_EOL;
        }

        if (!empty($createMethodParams)) {
            $createMethodParamsWithTypes = [];
            foreach ($createMethodParams as $paramName => [$type, $camelCaseParamName]) {
                $createMethodParamsWithTypes[] = "$type \$$camelCaseParamName";
            }
            $createMethodStr .= implode(', ', $createMethodParamsWithTypes) . ') {' . PHP_EOL;

            $createMethodStr .= "        return new self([" . PHP_EOL;
            foreach ($createMethodParams as $paramName => [, $camelCaseParamName]) {
                $createMethodStr .= "            '$paramName' => \$$camelCaseParamName," . PHP_EOL;
            }
            $createMethodStr .= "        ]);" . PHP_EOL;
        } else {
            $createMethodStr = '';
        }
        $paramsStr = implode('', $params);


        $setters = [];
        $getters = [];
        foreach ($allParams as $propName => [$mappedType, $camelCaseParamName]) {
            $setterName = 'set'.ucfirst($camelCaseParamName);
            $getterName = 'get'.ucfirst($camelCaseParamName);
            $setters[] = <<<EOT
            /**
             * @param $mappedType \$$camelCaseParamName
             */
            public function $setterName($mappedType \$$camelCaseParamName): $className
            {
                \$this->$propName = \$$camelCaseParamName;
                return \$this;
            }
        EOT;

            $getters[] = <<<EOT
                /**
                 * @return $mappedType
                 */
                public function $getterName(): $mappedType
                {
                    return \$this->$propName;
                }
            EOT;

        }

        $settersStr = implode(PHP_EOL.PHP_EOL, $setters);
        $gettersStr = implode(PHP_EOL.PHP_EOL, $getters);

        $descriptionParts = str_split($method->description, 70);
        $description = implode(PHP_EOL.' * ', $descriptionParts);
        $class =<<<EOT
        <?php
        /**
         * $description
         */
        class $className extends Request {
        $paramsStr
        $createMethodStr
        $settersStr
        $gettersStr
        }
        EOT;

        if (!file_exists(__DIR__.'/../src/Requests')) {
            mkdir(__DIR__.'/../src/Requests');
        }

        if (!file_exists(__DIR__.'/../src/Requests/'.$className.'.php')) {
            echo "Creating $className".PHP_EOL;
            //file_put_contents(__DIR__.'/../src/Requests/'.$className.'.php', $class);
        } else {
            echo "Skipping $className".PHP_EOL;
        }
    }

}

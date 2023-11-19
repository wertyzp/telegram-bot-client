<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$url = 'https://core.telegram.org/bots/api';

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

class Parameter
{
    public string $name;
    public string $type;
    public string $description;
    public string $required;
}

class Method
{
    public string $name;
    public string $description;
    public string $returnType;
    public array $parameters;
}

$method = null;

$returns = [];
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
            echo "Method: $item->textContent" . PHP_EOL;
        }

        if ($item->tagName === 'h4' && count($methodData) === 2) {

            $method = new Method();
            $method->name = $methodData[0];
            $method->description = $methodData[1];
            $method->parameters = [];
            $methods[] = $method;

            $methodData = [];

            $methodData[] = $item->textContent;
            echo "Method: $item->textContent" . PHP_EOL;
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

            if (!str_contains($item->textContent, ' ')) {
                $methodData[] = $item->textContent;
                echo "  Method: $item->textContent" . PHP_EOL;
            }
        }

        if ($item->tagName === 'p' && count($methodData) === 1) {
            $methodData[] = $item->textContent;
            $returnsAnchor = $xpath->query('a', $item);
            if ($returnsAnchor->length > 0) {
                $returns[reset($methodData)] = $returnsAnchor->item(0)->textContent;
                echo "  Returns: {$returnsAnchor->item(0)->textContent}" . PHP_EOL;
            }
            echo "  Description: $item->textContent" . PHP_EOL;
        }

        if ($item->tagName === 'table' && count($methodData) === 2) {
            $trs = $xpath->query('tbody/tr', $item);

            $parameters = [];
            foreach ($trs as $tr) {
                $parameter = [];
                $parameter[] = $xpath->query('td[1]', $tr)->item(0)->textContent;
                $parameter[] = $xpath->query('td[2]', $tr)->item(0)->textContent;
                $parameter[] = $xpath->query('td[3]', $tr)->item(0)->textContent;
                $parameter[] = $xpath->query('td[4]', $tr)->item(0)->textContent;
                echo "  Parameter: {$parameter[0]} type: {$parameter[1]} required: {$parameter[2]}" . PHP_EOL;
                $parameters[] = $parameter;
            }

            $methodData[] = $parameters;
        }
    }
}

$typeMap = [
    'String' => 'string',
    'Integer' => 'int',
    'Float' => 'float',
    'Float number' => 'float',
    'Boolean' => 'bool',
    'True' => 'bool',
    'Array' => 'array',
];

foreach ($methods as $method) {
    $className = ucfirst($method->name);
    $params = [];
    $createMethodStr = '    public static function create(';
    $createMethodParams = [];
    $allParams = [];
    $uses = [];
    foreach ($method->parameters as $parameter) {
        $type = $parameter->type;
        $descArray = str_split($parameter->description, 70);
        $commentArray = [];
        $commentArray[] = '/**';
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
            $commentArray[] = " * @var $mappedType" . str_repeat('[]', $arrCount);
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

        foreach ($mappedTypes as $mappedType) {
            if (!in_array($mappedType, ['string', 'int', 'float', 'bool', 'array'])) {
                if (file_exists(__DIR__ . '/types/' . $mappedType . '.php')) {
                    $uses[] = "use Werty\\Http\\Clients\\TelegramBot\\$mappedType;";
                }
            }
        }

        // check mapped types for complex strings

        $opt = ($parameter->required === 'Optional');

        $prefix = '';
        $suffix = '';

        if ($opt) {
            if (count($mappedTypes) > 1) {
                array_unshift($mappedTypes, 'null');
                $suffix = ' = null';
            } else {
                $prefix = '?';
            }
        }

        $mappedTypesStr = implode('|', $mappedTypes);
        if (count($mappedTypes) < 2) {
            $mappedTypesStr = $prefix . $mappedTypesStr;
        }

        foreach ($commentArray as $key => $comment) {
            $commentArray[$key] = "    $comment";
        }

        $camelCaseParamName = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $parameter->name))));
        if (!$opt) {
            $createMethodParams[$parameter->name] = [$mappedTypesStr, $camelCaseParamName];
        }
        $allParams[$parameter->name] = [$mappedTypesStr, $camelCaseParamName];

        $params[] = implode(PHP_EOL, $commentArray) . PHP_EOL;
        $params[] = "    protected $prefix$mappedTypesStr \$$parameter->name$suffix;" . PHP_EOL;
    }

    if (!empty($createMethodParams)) {
        $createMethodParamsWithTypes = [];
        foreach ($createMethodParams as $paramName => [$type, $camelCaseParamName]) {
            $createMethodParamsWithTypes[] = "$type \$$camelCaseParamName";
        }
        $createMethodStr .= implode(', ', $createMethodParamsWithTypes) . '): self' . PHP_EOL;
        $createMethodStr .= '    {' . PHP_EOL;

        $createMethodStr .= '        return new self([' . PHP_EOL;
        foreach ($createMethodParams as $paramName => [, $camelCaseParamName]) {
            $createMethodStr .= "            '$paramName' => \$$camelCaseParamName," . PHP_EOL;
        }
        $createMethodStr .= '        ]);' . PHP_EOL;
        $createMethodStr .= '    }' . PHP_EOL;
    } else {
        $createMethodStr = '';
    }
    $paramsStr = implode('', $params);

    $setters = [];
    $getters = [];
    foreach ($allParams as $propName => [$mappedType, $camelCaseParamName]) {
        $setterName = 'set' . ucfirst($camelCaseParamName);
        $getterName = 'get' . ucfirst($camelCaseParamName);
        $setters[] = <<<EOT
        /**
         * @param $mappedType \$$camelCaseParamName
         * @return $className
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
    $usesStr = implode(PHP_EOL, $uses);
    $settersStr = implode(PHP_EOL . PHP_EOL, $setters);
    $gettersStr = implode(PHP_EOL . PHP_EOL, $getters);

    $descriptionParts = str_split($method->description, 70);
    $description = implode(PHP_EOL . ' * ', $descriptionParts);

    $class = <<<EOT
    <?php

    namespace Werty\Http\Clients\TelegramBot\Requests;

    $usesStr
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

    if (!file_exists(__DIR__ . '/../src/Requests')) {
        mkdir(__DIR__ . '/../src/Requests');
    }

    if (!file_exists(__DIR__ . '/../src/Requests/' . $className . '.php')) {
        echo "Creating $className" . PHP_EOL;
        file_put_contents(__DIR__ . '/../src/Requests/' . $className . '.php', $class);
    } else {
        echo "Skipping $className" . PHP_EOL;
    }

}

$file = __DIR__ . '/../src/NewClient.php';

$head = <<<EOT
<?php

namespace Werty\Http\Clients\TelegramBot;

class Client {
EOT;

print_r($returns);

$bodyParts = [];

require_once __DIR__ . '/../src/Client.php';

$rc = new ReflectionClass(\Werty\Http\Clients\TelegramBot\Client::class);

foreach ($methods as $method) {
    if ($rc->hasMethod($method->name)) {
        continue;
    }

    $className = ucfirst($method->name);
    if (str_contains($method->description, 'Returns True')) {
        $returnType = 'bool';
        $mapType = 'ModelBase::T_BOOLEAN';
    } elseif (isset($returns[$method->name])) {
        $returnType = $returns[$method->name];
        $path = dirname(__DIR__) . '/src/Types/' . $returnType . '.php';
        if (file_exists($path)) {
            $mapType = "Types\\$returnType::class";
            $returnType = 'Types\\' . $returnType;
        } else {
            $returnType = 'mixed';
            $mapType = 'CHANGEME::class';
        }
    } else {
        $returnType = 'mixed';
        $mapType = 'CHANGEME::class';
    }
    $part = <<<EOT
        public function $method->name(Requests\\$className \$request): $returnType
        {
            return \$this->send('$method->name', \$request->toArray(), $mapType);
        }
    EOT;

    $bodyParts[] = $part;
}

$foot = <<<'EOT'
}
EOT;

file_put_contents($file, $head . PHP_EOL . implode(PHP_EOL . PHP_EOL, $bodyParts) . PHP_EOL . $foot);

foreach ($methods as $method) {
    $expectedSerialize = [];
    foreach ($method->parameters as $param) {
        if (str_contains($param->description, 'JSON-serialized')) {
            $expectedSerialize[] = $param->name;
        }
    }

    $className = ucfirst($method->name);
    $requestClass = 'Werty\Http\Clients\TelegramBot\Requests\\' . $className;

    if (class_exists($requestClass)) {
        $rc = new \ReflectionClass($requestClass);

        $serialize = [];
        if ($rc->hasConstant('SERIALIZE_JSON')) {
            $serialize = $rc->getConstant('SERIALIZE_JSON');
        }

        $diff = array_diff($expectedSerialize, $serialize);
        if (!empty($diff)) {
            echo "Missing $className" . PHP_EOL;
            $items = '    \'' . implode("',\n    '", $expectedSerialize) . '\'';
            echo <<<EOT
            protected const SERIALIZE_JSON = [
            $items
            ];

            EOT;

        }

    }
}

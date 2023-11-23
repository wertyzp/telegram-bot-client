<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$rc = new ReflectionClass(\Werty\Http\Clients\TelegramBot\Client::class);
$methods = $rc->getMethods(ReflectionMethod::IS_PUBLIC);

$reverseMap = [
    'string' => 'ModelBase::T_STRING',
    'int' => 'ModelBase::T_INTEGER',
    'bool' => 'ModelBase::T_BOOLEAN',
    'float' => 'ModelBase::T_DOUBLE',
];

foreach ($methods as $method) {
    $methodName = $method->getName();
    $type = $method->getReturnType();
    if (!$type) {
        continue;
    }
    $params = $method->getParameters();
    if (empty($params)) {
        continue;
    }
    $param = reset($params);
    $paramType = $param->getType();
    $type = str_replace('Werty\Http\Clients\TelegramBot\\', '', "$type");
    $paramType = str_replace('Werty\Http\Clients\TelegramBot\\', '', "$paramType");

    if (isset($reverseMap[$type])) {
        $type = $reverseMap[$type];
    } else {
        $type = "$type::class";
    }

    echo "$paramType::class => ['$methodName', $type]," . PHP_EOL;
}

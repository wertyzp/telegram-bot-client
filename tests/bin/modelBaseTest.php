<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Requests\SendContact;
use Werty\Http\Clients\TelegramBot\Requests\SendVenue;
use Werty\Http\Clients\TelegramBot\ModelBase;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';


class ABC extends ModelBase {
    protected $b;
}


/**
for ($level = 0; is_array($type); $level++) {
    $typeKey = key($type);
    $type = reset($type);
}
$level--;
print_r($level);
print_r($type);

$p = null;

// for each array go deep up to remaining levels
$source = [];
$walk = function ($values, &$dst, $type, $level) use (&$walk) {
    foreach ($values as $k => $v) {
        if ($level > 0) {
            $dst[$k] = [];
            $walk($v, $dst[$k], $type, $level - 1);
            continue;
        }
        if (!is_iterable($v)) {
            $dst[$k] = $v;
        }
        $dst[$k] = new $type($v);
    }
};

$src = &$value;
$dst = &$source;

$walk($src, $dst, $type, $level);

print_r($source);

die();
*/
class SUT extends ModelBase {
    protected const TYPE_MAP = [
        'a' => [[[ABC::class]]],
    ];

    protected $a;
}
$value = [
    'a' => [
        [[['b' => 'a'], ['b' => 'c']]],
        [[['b' => 'd'], ['b' => 'e']]]
    ],
];

$a = new SUT($value);

print_r($a);

/*
class SUT extends ModelBase {
    protected const TYPE_MAP = [
        'a' => [
            A::class => ['prop', 'a',],
            B::class => ['prop', 'b',],
        ],
    ];

    protected $a;
}

class A extends ModelBase {
    protected $prop;
}

class B extends ModelBase {
    protected $prop;
}

$a = new SUT([
    'a' => [
        'prop' => 'a',
    ],
    'c' => 'd',
]);

$b = new SUT([
    'a' => [
        'prop' => 'b',
    ],
    'c' => 'd',
]);

print_r($a);
print_r($b);
*/

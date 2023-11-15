<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

abstract class ModelBase
{
    public const T_BOOLEAN = 'boolean';
    public const T_INTEGER = 'integer';
    public const T_DOUBLE = 'double';
    public const T_STRING = 'string';
    public const T_ARRAY = 'array';
    public const T_OBJECT = 'object';
    public const T_RESOURCE = 'resource';
    public const T_RESOURCE_CLOSED = 'resource (closed)';
    public const T_UNKNOWN_TYPE = 'unknown type';

    protected const T_SCALAR = [
        self::T_STRING => true,
        self::T_BOOLEAN => true,
        self::T_DOUBLE => true,
        self::T_INTEGER => true
    ];

    protected const TYPE_MAP = [
    ];

    protected const RESTRICTIVE = false;

    public function __construct($dataObject = [])
    {
        $this->fill($dataObject);
    }

    protected function fill($dataObject = [])
    {
        $data = (array)$dataObject;

        $typeMaps = [];
        $class = get_class($this);

        do {
            $typeMaps[] = $class::TYPE_MAP;
        } while ($class = get_parent_class($class));

        $typeMap = array_merge(...array_reverse($typeMaps));

        foreach ($data as $key => $value) {
            if (!isset($typeMap[$key])) {
                if (static::RESTRICTIVE || !empty($this->{$key})) {
                    // skip
                    continue;
                }
                // direct assignment
                $this->{$key} = $value;
                continue;
            }
            $map = $typeMap[$key];
            $this->{$key} = self::mapType($map, $value);
        }
    }

    public static function mapType($map, $value)
    {
        if (!is_array($map)) {
            return self::map($map, $value);
        }

        if (count($map) > 1) {
            // this is a condition map
            foreach ($map as $type => [$prop, $val]) {
                if ($value[$prop] === $val) {
                    return self::map($type, $value);
                }
            }
            return $value;
        }

        // we've got an array, expected to create an array
        $typeKey = self::T_INTEGER;
        $type = $map;
        for ($level = 0; is_array($type); $level++) {
            $typeKey = key($type);
            $type = reset($type);
        }

        $level--;
        $result = [];
        $src = &$value;
        self::subarrayMap($src, $result, $type, $typeKey, $level);
        return $result;
    }

    private static function subarrayMap($values, &$dst, $type, $typeKey, $level)
    {
        foreach ($values as $k => $v) {
            if ($level > 0) {
                $dst[$k] = [];
                self::subarrayMap($v, $dst[$k], $type, $typeKey, $level - 1);
                continue;
            }
            if (!self::isScalar($typeKey)) {
                $dst[] = self::map($type, $v);
                continue;
            }
            $dst[$k] = self::map($type, $v);
        }
    }


    private static function map($type, $value)
    {
        if (isset(self::T_SCALAR[$type])) {
            settype($value, $type);
        } elseif (is_string($type) && class_exists($type)) {
            $value = new $type($value);
        }
        return $value;
    }

    public function toArray($only = []): array
    {
        $vars = get_object_vars($this);

        return $this->_toArray($vars, $only);
    }

    private function _toArray($array, $only = []): array
    {
        $result = [];
        foreach ($array as $key => $value) {
            if (!empty($only) && !in_array($key, $only)) {
                continue;
            }

            if ($value instanceof self) {
                $result[$key] = $value->toArray();
                continue;
            }

            if ($value instanceof \stdClass) {
                $result[$key] = $this->_toArray((array) $value);
                continue;
            }

            if (is_array($value)) {
                $result[$key] = $this->_toArray($value);
                continue;
            }
            $result[$key] = $value;
        }

        return $result;
    }

    public static function isScalar(string|int $type): bool
    {
        return in_array($type, self::T_SCALAR);
    }
}

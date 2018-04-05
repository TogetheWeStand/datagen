<?php

namespace Esizov\datagen\base;

class Process
{
    private const DATAGEN_PREFIX = 'datagen\\';
    private const BASE_PREFIX = 'base\\';

    /**
     * @param string $param param name from schema
     * @return string full path to class file
     */
    public static function genClassName($param)
    {
        $prefix = self::DATAGEN_PREFIX;
        $classPostfix = 'Gen';
        $subNameArr = explode('_', $param);
        $className = '';

        foreach ($subNameArr as $subName) {
            $className .= ucfirst($subName);
        }

        if (in_array($className . $classPostfix . '.php', scandir(__DIR__))) {
            $prefix = 'Esizov\\' . $prefix . self::BASE_PREFIX;
        }

        return $prefix . $className . $classPostfix;
    }
}
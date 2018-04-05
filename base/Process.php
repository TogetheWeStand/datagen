<?php

namespace Esizov\Datagen\base;

/**
 * Class Process
 * @package Esizov\datagen\base
 */
class Process
{
    private const VENDOR_NAME = 'Esizov\\';
    private const DATAGEN_PREFIX = 'Datagen';
    private const BASE_PREFIX = 'base\\';
    private const FIRST_LVL_PREFIX = 'First\Level\\';

    /**
     * @param string $param param name from schema
     * @return string full path to class file
     */
    public static function genClassName($param)
    {
        $prefix = self::VENDOR_NAME . self::DATAGEN_PREFIX . '\\';
        $classPostfix = 'Gen';
        $subNameArr = explode('_', $param);
        $className = '';

        foreach ($subNameArr as $subName) {
            $className .= ucfirst($subName);
        }

        if (in_array($className . $classPostfix . '.php', scandir(__DIR__))) {
            $prefix .= self::BASE_PREFIX;
        } elseif (in_array($className . $classPostfix . '.php', scandir(  '/app/' . lcfirst(self::DATAGEN_PREFIX) . '/first-level'))) {
            $prefix .= self::FIRST_LVL_PREFIX;
        }

        return $prefix . $className . $classPostfix;
    }
}
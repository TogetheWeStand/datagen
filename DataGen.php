<?php

namespace app\datagen;

class DataGen
{
    /**
     * @param string $type
     * @param int $length
     * @return bool|string
     */
    public function genName($type, $length)
    {
        $name = '';
        $chars = ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'q', 'w', 'e',
                  'r', 't', 'y', 'u', 'i', 'o', 'p', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];

        if ($type === 'string') {
            for ($i = 0; $i < $length; $i++) {
                $name .= $chars[mt_rand( 0, 25)];
            }

            return ucfirst($name);
        }

        return false;
    }

    public function genAge($type)
    {
        $age = 0;

        if ($type === 'integer') {
            $age = mt_rand(18, 99);
        }

        return $age;
    }
}
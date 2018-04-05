<?php

namespace Esizov\Datagen\base;

/**
 * Class NewUserBirthDateGen
 * @package datagen
 */
class NewUserBirthDateGen
{
    /**
     * @return int
     */
    public function gen()
    {
        return mt_rand(1000000000, 1500000000);
    }
}

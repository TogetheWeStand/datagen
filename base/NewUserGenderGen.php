<?php

namespace Esizov\Datagen\base;

/**
 * Class NewUserGenderGen
 * @package datagen
 */
class NewUserGenderGen
{
    private $gender = ['MALE', 'FEMALE'];

    /**
     * @return string
     */
    public function gen()
    {
        return $this->gender[mt_rand(0, 1)];
    }
}

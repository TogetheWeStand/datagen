<?php

namespace datagen;

use Esizov\datagen\base\StringGen;

/**
 * Class UserPasswordGen
 * @package datagen
 */
class UserPasswordGen extends StringGen
{
    /**
     * UserPasswordGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUpper
     * @param string $userName
     */
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct($charSet, true, true);
    }

    /**
     * @param int $length
     * @return string
     */
    public function gen($length = 0)
    {
        return parent::gen(mt_rand(6,12));
    }
}

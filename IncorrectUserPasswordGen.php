<?php

namespace datagen;

use Esizov\datagen\base\StringGen;

/**
 * Class IncorrectUserPasswordGen
 * @package datagen
 */
class IncorrectUserPasswordGen extends StringGen
{
    /**
     * IncorrectUserPasswordGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUpper
     * @param string $userName
     */
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct($charSet, $withNums, $randUpper);
    }

    /**
     * @param int $length
     * @return string
     */
    public function gen($length = 0)
    {
        return parent::gen(mt_rand(0,5));
    }
}

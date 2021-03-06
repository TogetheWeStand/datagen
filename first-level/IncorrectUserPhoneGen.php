<?php

namespace Esizov\Datagen\First\Level;

use Esizov\Datagen\base\StringGen;

/**
 * Class IncorrectUserPhoneGen
 * @package datagen
 */
class IncorrectUserPhoneGen extends StringGen
{
    /**
     * IncorrectUserPhoneGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUpper
     * @param string $userName
     */
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct('N', $withNums, $randUpper);
    }

    /**
     * @param int $length
     * @return string
     */
    public function gen($length = 0)
    {
        return parent::gen(mt_rand(0,9));
    }
}

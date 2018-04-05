<?php

namespace Esizov\Datagen\Second\Level;

use Esizov\Datagen\First\Level\UserEmailGen;

/**
 * Class NewUserEmailGen
 * @package datagen
 */
class NewUserEmailGen extends UserEmailGen
{
    /**
     * NewUserEmailGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUpper
     * @param string $userName
     */
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct($charSet, $withNums, $randUpper, '');
    }
}

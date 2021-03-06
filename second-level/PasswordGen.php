<?php

namespace Esizov\Datagen\Second\Level;

use Esizov\Datagen\First\Level\UserPasswordGen;

/**
 * Class PasswordGen
 * @package datagen
 */
class PasswordGen extends UserPasswordGen
{
    private $password = null;

    /**
     * PasswordGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUpper
     * @param string $userName
     * @param string $userPassword
     */
    public function __construct($charSet, $withNums, $randUpper, $userName, $userPassword)
    {
        parent::__construct($charSet, $withNums, $randUpper, $userName);

        $this->password = $userPassword;
    }

    /**
     * @param int $length
     * @return null|string
     */
    public function gen($length = 0)
    {
        return $this->password;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

//include_once('UserPasswordGen.php');

class PasswordGen extends UserPasswordGen
{
    private $password = null;

    public function __construct($charSet, $withNums, $randUpper, $userName, $userPassword)
    {
        parent::__construct($charSet, $withNums, $randUpper, $userName);

        $this->password = $userPassword;
    }

    public function gen($length = 0)
    {
        return $this->password;
    }
}

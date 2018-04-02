<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

include_once('UserEmailGen.php');

class NewUserEmailGen extends UserEmailGen
{
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct($charSet, $withNums, $randUpper, '');
    }
}

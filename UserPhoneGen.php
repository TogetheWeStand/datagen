<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace app\datagen;

include_once('StringGen.php');

class UserPhoneGen extends StringGen
{
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct('N', $withNums, $randUpper);
    }

    public function gen($length = 0)
    {
        return parent::gen(mt_rand(10,15));
    }
}

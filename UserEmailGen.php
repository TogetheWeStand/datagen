<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace app\datagen;

include_once('StringGen.php');

class UserEmailGen extends StringGen
{
    const DOMAIN = '@sokolov.net';
    private $userName = '';

    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct();

        if (empty($userName)) {
            $this->userName = ucfirst(parent::gen(mt_rand(3, 10)));
        } else {
            $this->userName = $userName;
        }
    }

    public function gen($length = 0)
    {
        return explode(' ', $this->userName)['0'] . self::DOMAIN;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class UserEmailGen
 * @package datagen
 */
class UserEmailGen extends StringGen
{
    const DOMAIN = '@sokolov.net';
    private $userName = '';

    /**
     * UserEmailGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUpper
     * @param string $userName
     */
    public function __construct($charSet, $withNums, $randUpper, $userName)
    {
        parent::__construct();

        if (empty($userName)) {
            $this->userName = ucfirst(parent::gen(mt_rand(3, 10)));
        } else {
            $this->userName = $userName;
        }
    }

    /**
     * @param int $length
     * @return string
     */
    public function gen($length = 0)
    {
        return explode(' ', $this->userName)['0'] . self::DOMAIN;
    }
}

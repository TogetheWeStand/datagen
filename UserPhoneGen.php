<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class UserPhoneGen
 * @package datagen
 */
class UserPhoneGen extends StringGen
{
    /**
     * UserPhoneGen constructor.
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
        return parent::gen(mt_rand(10,15));
    }
}

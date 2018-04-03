<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class NewUserBirthDateGen
 * @package datagen
 */
class NewUserBirthDateGen
{
    /**
     * @return int
     */
    public function gen()
    {
        return mt_rand(1000000000, 1500000000);
    }
}

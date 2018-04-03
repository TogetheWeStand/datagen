<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class NewUserGenderGen
 * @package datagen
 */
class NewUserGenderGen
{
    private $gender = ['MALE', 'FEMALE'];

    /**
     * @return string
     */
    public function gen()
    {
        return $this->gender[mt_rand(0, 1)];
    }
}

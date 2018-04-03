<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class UserNameGen
 * @package datagen
 */
class UserNameGen extends StringGen
{
    /**
     * @param int $length
     * @return string
     */
    public function gen($length = 0)
    {
        return ucfirst(parent::gen(mt_rand(3, 10))) . ' ' . ucfirst(parent::gen(mt_rand(3, 10)));
    }
}

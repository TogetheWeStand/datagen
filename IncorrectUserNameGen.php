<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class IncorrectUserNameGen
 * @package datagen
 */
class IncorrectUserNameGen
{
    /**
     * @return int|string
     */
    public function gen()
    {
        if (mt_rand(0, 1)) {
            return '';
        } else {
            return mt_rand(999, 65536);
        }
    }
}

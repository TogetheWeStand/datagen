<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

class IncorrectUserEmailGen
{
    public function gen()
    {
        return mt_rand(0, 1) === 1 ? '' : 'Yedbcbc@@@derfd..ru';
    }
}

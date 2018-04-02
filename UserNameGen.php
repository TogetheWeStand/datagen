<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

include_once('StringGen.php');

class UserNameGen extends StringGen
{
    public function gen($length = 0)
    {
        return ucfirst(parent::gen(mt_rand(3, 10))) . ' ' . ucfirst(parent::gen(mt_rand(3, 10)));
    }
}

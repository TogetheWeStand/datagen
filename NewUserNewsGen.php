<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

class NewUserNewsGen
{
    private $news = [true, false];

    public function gen()
    {
        return (bool)$this->news[mt_rand(0, 1)];
    }
}

<?php

namespace Esizov\datagen\base;

/**
 * Class NewUserNewsGen
 * @package datagen
 */
class NewUserNewsGen
{
    private $news = [true, false];

    /**
     * @return bool
     */
    public function gen()
    {
        return (bool)$this->news[mt_rand(0, 1)];
    }
}

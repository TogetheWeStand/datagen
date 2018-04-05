<?php

namespace Esizov\Datagen\base;

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

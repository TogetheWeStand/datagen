<?php

namespace Esizov\datagen\base;

/**
 * Class IncorrectUserEmailGen
 * @package datagen
 */
class IncorrectUserEmailGen
{
    /**
     * @return string
     */
    public function gen()
    {
        return mt_rand(0, 1) === 1 ? '' : 'Yedbcbc@@@derfd..ru';
    }
}

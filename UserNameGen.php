<?php

declare(strict_types = 1);

namespace datagen;

use Esizov\datagen\base\StringGen;

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

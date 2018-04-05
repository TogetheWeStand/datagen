<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace Esizov\Datagen\First\Level;

use Esizov\Datagen\base\GetFileDataByRegExp;

/**
 * Class ArticleGen
 * @package datagen
 */
class ArticleGen extends GetFileDataByRegExp
{
    /**
     * @return mixed
     */
    public function gen()
    {
        return parent::get("/\"ARTICLE\":\"([0-9]+)\",/");
    }
}

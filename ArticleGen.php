<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;


class ArticleGen extends GetFileDataByRegExp
{
    public function gen()
    {
        return parent::get("/\"ARTICLE\":\"([0-9]+)\",/");
    }
}
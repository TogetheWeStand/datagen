<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class BarcodeGen
 * @package datagen
 */
class BarcodeGen extends GetFileDataByRegExp
{
    /**
     * @return mixed
     */
    public function gen()
    {
        return parent::get("/{\"BARCODE\":\"([0-9]+)\",/");
    }
}

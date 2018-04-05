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

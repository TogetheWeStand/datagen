<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;


class NonExistsBarcodeGen extends GetFileDataByRegExp
{
    private $alreadyExists = null;
    private $newBarCode = null;

    public function gen()
    {
        $string = new StringGen('N');
        $this->alreadyExists = parent::get("/{\"BARCODE\":\"([0-9]+)\",/", true);
//var_dump($this->alreadyExists);
//exit;
        do {
            $this->newBarCode = $string->gen(13);
        } while(in_array($this->newBarCode, $this->alreadyExists, true));

        return $this->newBarCode;
    }
}

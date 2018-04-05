<?php

namespace datagen;

use Esizov\datagen\base\GetFileDataByRegExp;
use Esizov\datagen\base\StringGen;

/**
 * Class NonExistsBarcodeGen
 * @package datagen
 */
class NonExistsBarcodeGen extends GetFileDataByRegExp
{
    private $alreadyExists = null;
    private $newBarCode = null;

    /**
     * @return null|string
     */
    public function gen()
    {
        $string = new StringGen('N');
        $this->alreadyExists = parent::get("/{\"BARCODE\":\"([0-9]+)\",/", true);

        do {
            $this->newBarCode = $string->gen(13);
        } while(in_array($this->newBarCode, $this->alreadyExists, true));

        return $this->newBarCode;
    }
}

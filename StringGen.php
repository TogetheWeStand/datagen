<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:08
 */

namespace app\datagen;

class StringGen
{
    private $charsL = ['a', 's', 'd', 'f', 'g',
        'h', 'j', 'k', 'l', 'q',
        'w', 'e', 'r', 't', 'y',
        'u', 'i', 'o', 'p', 'z',
        'x', 'c', 'v', 'b', 'n',
        'm'];

    private $charsK = ['й', 'ц', 'у', 'к', 'е',
        'н', 'г', 'ш', 'щ', 'з',
        'ф', 'ы', 'в', 'а', 'п',
        'р', 'о', 'л', 'д', 'ж',
        'э', 'х', 'ъ', 'я', 'ч',
        'с', 'м', 'и', 'т', 'ь',
        'б', 'ю'];

    private $nums = ['0', '1', '2', '3', '4',
        '5', '6', '7', '8', '9'];

    private $charSet = array();
    private $withNums;
    private $randUper;
    private $charSetBorder = 25;

    /**
     * StringGen constructor.
     * @param string $charSet
     * @param bool $withNums
     * @param bool $randUper
     */
    public function __construct($charSet = 'L', $withNums = false, $randUper = false)
    {
        if ($charSet === 'K') {
            $this->charSet = $this->charsK;
            $this->charSetBorder = 31;
        } elseif ($charSet === 'N') {
            $this->charSet = $this->nums;
            $this->charSetBorder = 9;
        } else {
            $this->charSet = $this->charsL;
        }

        $this->withNums = $withNums;
        $this->randUper = $randUper;
    }

    /**
     * @return mixed|string
     */
    private function __genRandomChar()
    {
       if ($this->randUper) {
           return mt_rand(0, 1) === 1 ? strtoupper($this->charSet[mt_rand(0, $this->charSetBorder)]) :
                                                   $this->charSet[mt_rand(0, $this->charSetBorder)];
       } else {
           return $this->charSet[mt_rand(0, $this->charSetBorder)];
       }
    }

    /**
     * @param int $length
     * @return string
     */
    public function gen($length)
    {
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            if ($this->withNums) {
                if (mt_rand(0, 1) === 1) {
                    $string .= $this->__genRandomChar();
                } else {
                    $string .= $this->nums[mt_rand(0,9)];
                }
            } else {
                $string .= $this->__genRandomChar();
            }
        }

        return $string;
    }
}

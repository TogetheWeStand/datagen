<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.sizov
 * Date: 29.03.18
 * Time: 9:41
 */

namespace datagen;

/**
 * Class GetFileDataByRegExp
 * @package datagen
 */
class GetFileDataByRegExp
{
    const FILE_NAME = 'barcodes.json';

    /**
     * @param string $reg_exp
     * @param bool $arr_of_values
     * @return mixed
     */
    public function get($reg_exp, $arr_of_values = false)
    {
        $file_data = file_get_contents(self::FILE_NAME);

        preg_match_all($reg_exp, $file_data, $data);

        if ($arr_of_values) {
            return $data['1'];
        }

        return $data['1'][mt_rand(0, count($data['1']) - 1)];
    }
}

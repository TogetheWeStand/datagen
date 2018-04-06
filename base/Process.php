<?php

declare(strict_types = 1);

namespace Esizov\Datagen\base;

/**
 * Class Process
 * @package Esizov\datagen\base
 */
class Process
{
    private const VENDOR_NAME = 'Esizov\\';
    private const APP_PATH = '/app/';
    private const DATAGEN_PREFIX = 'Datagen';
    private const BASE_PREFIX = 'base\\';
    private const FIRST_LVL_PREFIX = 'First\Level\\';
    private const FIRST_LVL_PATH = '/first-level';
    private const SECOND_LVL_PATH = '/second-level';
    private const SECOND_LVL_PREFIX = 'Second\Level\\';
    private const PHP_EXTENTION = '.php';
    private const JSON_EXTENTION = '.json';

    /**
     * @param int $count
     * @param string $schema
     */
    public function gen(int $count, string $schema)
    {
        $result = array();
        $set = null;
        $decodedSchema = $this->decodeSchema($schema);
        $isCli = !isset($_GET['count']);
        $count = $isCli ? $count : $_GET['count'];

        for ($i = 0; $i < $count; $i++) {
            foreach ($decodedSchema['properties'] as $key => $prop) {

                $className = $this->genClassName($key);
                $model = new $className(null, null, null, $set['user_name'], $set['user_password']);
                $set[$key] = $model->gen();
            }

            $result[] = $set;
        }

        $this->writeToFile($isCli, $result, $decodedSchema);
    }

    /**
     * @param string $schema
     * @return mixed
     */
    private function decodeSchema(string $schema)
    {
        $schema = file_get_contents($schema);

        $decoded_schema = json_decode($schema, true);

        if ($decoded_schema === null) {
            echo "Incorrect schema!\r\n";
            exit;
        }

        return $decoded_schema;
    }

    /**
     * @param string $param
     * @return string
     */
    private function genClassName(string $param)
    {
        $prefix = self::VENDOR_NAME . self::DATAGEN_PREFIX . '\\';
        $classPostfix = 'Gen';
        $subNameArr = explode('_', $param);
        $className = '';

        foreach ($subNameArr as $subName) {
            $className .= ucfirst($subName);
        }

        $classFileName = $className . $classPostfix . self::PHP_EXTENTION;
        $noBasePath = self::APP_PATH . lcfirst(self::DATAGEN_PREFIX);

        if ($this->checkFileInDir($classFileName, __DIR__)) {
            $prefix .= self::BASE_PREFIX;
        } elseif ($this->checkFileInDir($classFileName, $noBasePath . self::FIRST_LVL_PATH)) {
            $prefix .= self::FIRST_LVL_PREFIX;
        } elseif ($this->checkFileInDir($classFileName, $noBasePath . self::SECOND_LVL_PATH)) {
            $prefix .= self::SECOND_LVL_PREFIX;
        }

        return $prefix . $className . $classPostfix;
    }

    /**
     * @param string $file
     * @param string $dir
     * @return bool
     */
    private function checkFileInDir(string $file, string $dir)
    {
        return in_array($file, scandir($dir));
    }

    /**
     * @param bool $cli
     * @param array $result
     * @param array $decodedSchema
     */
    private function writeToFile(bool $cli, array $result, array $decodedSchema)
    {
        $splitter = ',';
        $file_name = $this->getFileName($decodedSchema);

        preg_match_all("/{.[^{}]*}/", json_encode($result, JSON_UNESCAPED_UNICODE), $splitted);
        $count = count($splitted['0']);

        $fp = fopen($file_name, "w+");

        fwrite($fp, '[' . PHP_EOL);

        foreach ($splitted['0'] as $key => $string) {
            if ($count === 1) {
                $splitter = '';
            }

            if (!$cli) {
                echo $string . "
                    ";
            }

            fwrite($fp, $string . $splitter . PHP_EOL);
            $count--;
        }

        fwrite($fp, ']' . PHP_EOL);
        fclose($fp);
    }

    /**
     * @param array $decoded_schema
     * @return string
     */
    private function getFileName(array $decoded_schema)
    {
        preg_match_all("/[a-zA-Z0-9]+/", $decoded_schema['title'], $file_name);

        $file_name = implode('', $file_name['0']);
        $file_name = mb_strtolower($file_name);
        return trim($file_name . self::JSON_EXTENTION);
    }
}
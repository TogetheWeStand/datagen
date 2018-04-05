<?php

/**
 * This start file for test data generator.
 * Envisaged two modes for start this script - cli and fpm.
 *
 * For start in cli mode type in command line - php generator.php 'n',
 * where 'n' it is a number of sets of test data need to be generate.
 *
 * For start in fpm mode type in request string of browser -
 * <host domain>/generator.php/?count='n', where 'n' it is a number
 * of sets of test data need to be generate.
 *
 * Schema must be saved in schema.json file in root directory of
 * application.
 *
 * Generated data will be located in
 * <schema name in lower case without underscores and spaces>.json
 * in root directory of application.
 */

declare(strict_types = 1);

namespace datagen;

use Esizov\datagen\base\Process;

include_once('includes.php');

$cli = !isset($_GET['count']);
$count = $cli ? $argv['1'] : $_GET['count'];

$schema = file_get_contents('schema.json');

$decoded_schema = json_decode($schema, true);

if ($decoded_schema === null) {
    echo "Incorrect schema!\r\n";
    exit;
}

preg_match_all("/[a-zA-Z0-9]+/", $decoded_schema['title'], $file_name);

$file_name = implode('', $file_name['0']);
$file_name = mb_strtolower($file_name);
$file_name = trim($file_name . ".json");

$properties = $decoded_schema['properties'];
$result = null;
$set = null;
$splitter = ',';

for ($i = 0; $i < $count; $i++) {
    foreach ($properties as $key => $prop) {

        $className = Process::genClassName($key);
        $model = new $className(null, null, null, $set['user_name'], $set['user_password']);
        $set[$key] = $model->gen();
    }

    $result[] = $set;
}

$fp = fopen($file_name, "w+");

preg_match_all("/{.[^{}]*}/", json_encode($result, JSON_UNESCAPED_UNICODE), $splitted);

fwrite($fp, '[' . PHP_EOL);

$count = count($splitted['0']);

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
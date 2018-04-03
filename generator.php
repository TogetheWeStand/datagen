<?php

namespace datagen;

include_once('includes.php');

$cli = !isset($_GET['count']);
$count = $cli ? $argv['1'] : $_GET['count'];

/**
 * @param $param
 * @return string
 */
function _genClassName($param)
{
    $classPostfix = 'Gen';
    $subNameArr = explode('_', $param);
    $className = '';

    foreach ($subNameArr as $subName) {
        $className .= ucfirst($subName);
    }

    return 'datagen\\' . $className . $classPostfix;
}

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

        $className = _genClassName($key);
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
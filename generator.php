<?php

namespace app\datagen;

include_once('UserNameGen.php');
include_once('UserEmailGen.php');
include_once('UserPasswordGen.php');
include_once('UserPhoneGen.php');
include_once('IncorrectUserNameGen.php');
include_once('IncorrectUserEmailGen.php');
include_once('IncorrectUserPasswordGen.php');
include_once('IncorrectUserPhoneGen.php');

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

    return 'app\datagen\\' . $className . $classPostfix;
}

$schema = file_get_contents('schema.json');
//    "{
//    \"title\": \"Mocking Data\",
//    \"type\": \"object\",
//    \"properties\": {
//        \"user_name\": {
//            \"description\": \"Actually it is a full user name such as Vasya Pupkin. \",
//            \"type\": \"string\"
//        },
//        \"user_email\": {
//            \"description\": \"Valid email address related to user_name in sokolov.net domain\",
//            \"type\": \"string\"
//        },
//        \"user_password\": {
//            \"description\": \"May be equal to email\",
//            \"type\": \"string\"
//        },
//        \"user_phone\": {
//            \"description\": \"Phone number. See MSISDN\",
//            \"type\": \"string\"
//        },
//        \"incorrect_user_name\": {
//            \"description\": \"May be empty\",
//            \"type\": \"string\"
//        },
//        \"incorrect_user_email\": {
//            \"description\": \"incorrect email\",
//            \"type\": \"string\"
//        },
//        \"incorrect_user_password\": {
//            \"description\": \"May be empty\",
//            \"type\": \"string\"
//        },
//        \"incorrect_user_phone\": {
//            \"description\": \"Phone number. See MSISDN\",
//            \"type\": \"string\"
//        }
//    },
//    \"required\": [
//        \"user_name\", \"user_email\", \"user_password\", \"user_name\",
//        \"incorrect_user_name\", \"incorrect_user_email\", \"incorrect_user_password\", \"incorrect_user_name\"
//    ]
//}";

$decoded_schema = json_decode($schema, true);

if ($decoded_schema === null) {
    echo "Incorrect schema!\r\n";
    exit;
}

preg_match_all("/[a-zA-Z0-9]+/", $decoded_schema['title'], $file_name);

$file_name = implode('', $file_name['0']);
$file_name = mb_strtolower($file_name);
$file_name = trim($file_name . ".json");

$required = $decoded_schema['required'];
$properties = $decoded_schema['properties'];
$result = null;
$set = null;
$splitter = ',';

for ($i = 0; $i < $argv['1']; $i++) {
    foreach ($properties as $key => $prop) {

        $className = _genClassName($key);
        $model = new $className(null, null, null, $set['user_name']);
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

    fwrite($fp, $string . $splitter . PHP_EOL);
    $count--;
}

fwrite($fp, ']' . PHP_EOL);
fclose($fp);
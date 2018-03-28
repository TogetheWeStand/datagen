<?php

//namespace \app\datagen;
//use  \app\datagen\DataGen;

class DataGen
{
    private $chars = ['a', 's', 'd', 'f', 'g',
                      'h', 'j', 'k', 'l', 'q',
                      'w', 'e', 'r', 't', 'y',
                      'u', 'i', 'o', 'p', 'z',
                      'x', 'c', 'v', 'b', 'n', 'm'];
    private $nums = ['0', '1', '2', '3', '4',
                     '5', '6', '7', '8', '9'];
    private $email_domain = '@sokolov.net';
    /**
     * @param int $length
     * @return string
     */
    public function genUserName($length)
    {
        $first_name = '';
        $last_name = '';
        $full_name = '';
        $true_length = $length - 1;

        for ($i = 0; $i < $true_length; $i++) {

            if ($i <= $true_length/2) {
                $first_name .= $this->chars[mt_rand(0, 25)];
            } else {
                $last_name .= $this->chars[mt_rand(0, 25)];
            }
        }

        $full_name = ucfirst($first_name) . ' ' . ucfirst($last_name);

        return $full_name;
    }

    public function genEmail($base)
    {
        $email = '';

        if (empty($base) || !isset($base)) {
            for ($i = 0; $i < mt_rand(6, 12); $i++) {
                $base .= $this->chars[mt_rand(0, 25)];
            }

            $email = $base . $this->email_domain;
        } else {
            $email = $base . $this->email_domain;
        }

        return $email;
    }
}

$schema = "{
    \"title\": \"Mocking Data\",
    \"type\": \"object\",
    \"properties\": {
        \"user_name\": {
            \"description\": \"Actually it is a full user name such as Vasya Pupkin. \",
            \"type\": \"string\"
        },
        \"user_email\": {
            \"description\": \"Valid email address related to user_name in sokolov.net domain\",
            \"type\": \"string\"
        },
        \"user_password\": {
            \"description\": \"May be equal to email\",
            \"type\": \"string\"
        },
        \"user_phone\": {
            \"description\": \"Phone number. See MSISDN\",
            \"type\": \"string\"
        }
    },
    \"required\": [\"user_name\", \"user_email\", \"user_password\", \"user_name\"]
}";

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

$model = new DataGen();

for ($i = 0; $i < $argv['1']; $i++)
{
    foreach ($properties as $key => $prop) {

        switch ($key) {
            case 'user_name':
                $min_length = 13;
                $max_length = 45;
                $set[$key] = $model->genUserName(mt_rand($min_length, $max_length));
                break;

            case 'user_email':
                $set[$key] = $model->genEmail(explode(' ', $set['user_name'])['0']);
                break;

            case 'user_password':
                break;

            case 'user_phone':
                break;
        }
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
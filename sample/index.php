<?php

require_once '../vendor/autoload.php';

use Garcia\JWT;

$jwt = new JWT('secret');

$payload = [
    'user_id' => 1,
    'username ' => 'johndoe',
    'email' => 'testing@testing.com',
    'role' => 'admin'
];

$token = $jwt->encode($payload);

echo "$token \n\n";

$decoded = $jwt->decode($token);

var_dump($decoded);
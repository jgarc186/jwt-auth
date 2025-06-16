## Table of Contents
- [Description](#description)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)
- [Author](#author)

## Requirements
- PHP 7.4 or higher
- Composer


# JWT
- A lightweight and straightforward PHP library for working with JSON Web Tokens (JWT). Compatible with any PHP framework, application, or library.

## Description
- This library offers an easy-to-use solution for implementing JWT in PHP projects. It integrates smoothly with any PHP-based setup, whether you're using a framework or building a standalone application.

## Features
- No configuration required.
- No dependencies.
- Lightweight.
- Easy to use.
- Works with PHP 7.4 and above.
- Works with any PHP framework, library, or application.

## Installation
```bash
composer require josegarcia/jwt-auth
```

## Usage
```php
<?php
require_once 'vendor/autoload.php';

use Garcia\JWT;

$jwt = new JWT('secret');

$payload = [
    'user_id' => 1,
    'username' => 'johndoe',
    'email' => 'testing@testing.com',
    'role' => 'admin'
];

$token = $jwt->encode($payload);

 echo "$token \n\n";
 
// $decoded = $jwt->decode($token);
// var_dump($decoded);

try {
    $decoded = $jwt->decode($token);
    var_dump($decoded);
} catch (\Exception $e) {
    echo "Token invalid: " . $e->getMessage();
}
```

## License
- This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author
- [GitHub](https://github.com/jgarc186)
- [LinkedIn](http://www.linkedin.com/in/jgarc186)

# JTW
- This package is a simple JWT (JSON Web Token) library for PHP. It is easy to use and works with any PHP framework, library, or application.

## Description
- This package is a simple JWT (JSON Web Token) library for PHP. It is easy to use and works with any PHP framework, library, or application.

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
    'username ' => 'johndoe',
    'email' => 'testing@testing.com',
    'role' => 'admin'
];

$token = $jwt->encode($payload);

echo "$token \n\n";

$decoded = $jwt->decode($token);

var_dump($decoded);
```

## License
- This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author
- [GitHub](https://github.com/jgarc186)
- [LinkedIn](www.linkedin.com/in/jgarc186)

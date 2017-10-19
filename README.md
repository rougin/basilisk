# Basilisk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A [Slytherin](https://github.com/rougin/slytherin) skeleton application.

## Install

Via Composer

``` bash
$ composer create-project rougin/basilisk:dev-master "acme"
```

## Getting Started

### Running migrations and seeds 

Before running the migrations/seeds, kindly update the database credentials first in `.env`.

``` bash
$ vendor/bin/phinx migrate -c app/config/phinx.php
$ vendor/bin/phinx seed:run -c app/config/phinx.php
```

**NOTE**: Running `seed:run` will load the seeders in **alphabetical** order.

### Running the application using PHP's built-in web server

``` bash
$ php -S localhost:8000 -t app/web
```

Now open your web browser and go to [http://localhost:8000](http://localhost:8000).

## What's inside?

### Installed

* [Blade](https://laravel.com/docs/5.5/blade) - a templating engine provided by [Laravel](https://laravel.com/)
* [Eloquent](https://laravel.com/docs/5.5/eloquent) - a simple ActiveRecord implementation for [Laravel](https://laravel.com/)
* [Phinx](https://phinx.org/) - a PHP Database Migrations for everyone (use `vendor/bin/phinx :command -c app/config/phinx.php`)
* [PHP dotenv](https://github.com/vlucas/phpdotenv) - loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER`
* [Slytherin](https://github.com/rougin/slytherin) - yet another extensible library/framework for PHP
* [Valitron](http://vancelucas.com/blog/valitron-the-simple-validation-library-that-doesnt-suck) - a simple, elegant, stand-alone validation library
* [Weasley](https://github.com/rougin/weasley) - generators and helpers for improving Slytherin worflow
* [Whoops!](https://filp.github.io/whoops) - a PHP error handler for cool kids

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

[ico-version]: https://img.shields.io/packagist/v/rougin/basilisk.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/rougin/basilisk/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/rougin/basilisk.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/rougin/basilisk.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rougin/basilisk.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/rougin/basilisk
[link-travis]: https://travis-ci.org/rougin/basilisk
[link-scrutinizer]: https://scrutinizer-ci.com/g/rougin/basilisk/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/rougin/basilisk
[link-downloads]: https://packagist.org/packages/rougin/basilisk
[link-author]: https://github.com/rougin
[link-contributors]: ../../contributors

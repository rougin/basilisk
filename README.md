# Slytherin Skeleton

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A simple [Slytherin](https://github.com/rougin/slytherin)-based web application.

## Install

Via Composer

``` bash
$ composer create-project rougin/slytherin-skeleton "acme"
```

## Getting Started

``` bash
$ php -S localhost:8000 -t public/
```

Then go to [http://localhost:8000](http://localhost:8000).

## What's inside?

* [Diactoros](https://github.com/zendframework/zend-diactoros) - a PSR-7 HTTP Message implementation
* [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html) - an object-relational mapper for PHP 5.4+
* [Pagerfanta](https://github.com/whiteoctober/Pagerfanta) - a paginator for PHP
* [Phinx](https://github.com/robmorgan/phinx) - a PHP Database Migrations for everyone
* [PHP dotenv](https://github.com/vlucas/phpdotenv) - loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically
* [Slytherin](https://github.com/rougin/slytherin) - an another extensible PHP library/framework
* [Stratigility](https://github.com/zendframework/zend-stratigility) - a middleware for PHP built on top of PSR-7
* [Twig](https://github.com/twigphp/Twig) - a flexible, fast, and secure template language for PHP
* [Valitron](http://vancelucas.com/blog/valitron-the-simple-validation-library-that-doesnt-suck) - a simple, elegant, stand-alone validation library
* [Whoops!](https://filp.github.io/whoops) - a PHP error handler for cool kids

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

Install [Selenium](http://www.seleniumhq.org/download/)

``` bash
$ wget http://selenium-release.storage.googleapis.com/2.53/selenium-server-standalone-2.53.1.jar
$ wget http://chromedriver.storage.googleapis.com/2.9/chromedriver_linux64.zip
$ unzip chromedriver_linux64.zip
$ chmod +x chromedriver
$ cp .env.example .env
$ java -jar selenium-server-standalone-2.53.1.jar -port 4444 &
$ php -S localhost:8000 -t public/ &
```

Run the test

``` bash
$ composer test
```

[ico-version]: https://img.shields.io/packagist/v/rougin/slytherin-skeleton.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/rougin/slytherin-skeleton/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/rougin/slytherin-skeleton.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/rougin/slytherin-skeleton.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rougin/slytherin-skeleton.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/rougin/slytherin-skeleton
[link-travis]: https://travis-ci.org/rougin/slytherin-skeleton
[link-scrutinizer]: https://scrutinizer-ci.com/g/rougin/slytherin-skeleton/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/rougin/slytherin-skeleton
[link-downloads]: https://packagist.org/packages/rougin/slytherin-skeleton
[link-author]: https://github.com/rougin
[link-contributors]: ../../contributors

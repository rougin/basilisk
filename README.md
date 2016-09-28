# Slytherin Skeleton

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
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

* [Carbon](https://github.com/briannesbitt/Carbon) - a simple PHP API extension for DateTime
* [Diactoros](https://github.com/zendframework/zend-diactoros) - a PSR-7 HTTP Message implementation
* [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html) - an object-relational mapper for PHP 5.4+
* [Hassan Khan's Config](https://github.com/hassankhan/config) - a lightweight configuration file loader
* [Johannes Schmitt's Serializer](http://jmsyst.com/libs/serializer) - allows you to (de-)serialize data of any complexity
* [MultiArray](https://github.com/tebru/multi-array) - provides easier access to multidimensional arrays
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

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

[ico-version]: https://img.shields.io/packagist/v/rougin/slytherin-skeleton.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/rougin/slytherin-skeleton/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rougin/slytherin-skeleton.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/rougin/slytherin-skeleton
[link-travis]: https://travis-ci.org/rougin/slytherin-skeleton
[link-downloads]: https://packagist.org/packages/rougin/slytherin-skeleton
[link-author]: https://github.com/rougin
[link-contributors]: ../../contributors

# Basilisk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]
[![Build Status][ico-build]][link-build]
[![Coverage Status][ico-coverage]][link-coverage]
[![Total Downloads][ico-downloads]][link-downloads]

`Basilisk` is a project skeleton specifically for the [Slytherin](https://roug.in/slytherin/) PHP micro-framework which contains an opinionated code structure based on [my experiences](https://roug.in/) creating projects using `Slytherin` as its foundation. The code structure should be easy to understand and be under [SOLID](https://en.wikipedia.org/wiki/SOLID) principles.

## Installation

Create a new `Basilisk` project via [Composer](https://getcomposer.org/):

``` bash
$ composer create-project rougin/basilisk "hogwarts"
```

Once created, kindly execute the one-time setup to the project:

``` bash
$ php setup.php
```

## Running the project

To run `Basilisk` in a web browser, the [PHP's built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php) can be used:

``` bash
$ php -S localhost:80 -t app/public
```

After running, open a web browser then proceed to http://localhost in a new tab.

> [!WARNING]
> This command should only be used for development purposes. It is recommended to use [Apache](https://httpd.apache.org/) or [Nginx](https://nginx.org/en/) in running this project.

## What's inside?

A `Basilisk` project contains a configuration of the following packages:

### Slytherin

[Slytherin](https://github.com/rougin/slytherin) is a simple and extensible PHP micro-framework that tries to achieve a [SOLID-based design](https://en.wikipedia.org/wiki/SOLID) for creating web applications. As `Slytherin` is the core foundation of `Basilisk`, the following packages of `Slytherin` has already been configured out of the box:

* [HttpIntegration](https://github.com/rougin/slytherin/wiki/Http) allows to use PHP's superglobals (e.g., `$_GET`, `$_POST`, etc.);
* [ConfigurationIntegration](https://github.com/rougin/slytherin/wiki/IntegrationInterface-Implementation) allows to use the `Configuration` class in any part of the code structure through dependency injection;
* [MiddlewareIntegration](https://github.com/rougin/slytherin/wiki/Middleware) provides a simple way in integrating [PSR-15](https://www.php-fig.org/psr/psr-15/) middlewares to HTTP requests and HTTP responses;
* [RoutingIntegration](https://github.com/rougin/slytherin/wiki/Routing) adds a systematic way of configuring HTTP routes and its routers; and
* [RendererIntegration](https://github.com/rougin/slytherin/wiki/Template) provides a simple logic for loading PHP templates.

> [!NOTE]
> Kindly see the [Slytherin's documentation](https://github.com/rougin/slytherin/wiki) on how to use the above-mentioned packages.

### Dotenv

[Dotenv](https://github.com/vlucas/phpdotenv) is a simple PHP package that loads environment variables from `.env` files to `getenv()`, `$_ENV` and `$_SERVER` automagically. This is one of the core packages of `Basilisk` as it uses environment variables in most of its configuration in the `app/config` directory:

```
# .env.example

#######################
# Application Settings
#######################
APP_NAME="Basilisk"
APP_VERSION="0.1.0"

# ...
```

``` php
// app/config/app.php

return array(

    // ...

    'name' => getenv('APP_NAME'), // returns "Basilisk"

    // ...

    'version' => getenv('APP_VERSION'), // returns "0.1.0"

    // ...

);
```

### Phinx

[Phinx](https://phinx.org/) is a tool made for PHP in performing database migrations. Being a framework-agnostic package, `Phinx` can create, write and perform database migrations easily. To use this package, kindly install it first using `Composer`:

``` bash
$ composer require robmorgan/phinx
```

Once installed, kindly check the `app/config/phinx.php` file on the variables that requires an update:

``` php
// app/config/phinx.php

return array(

    /**
     * Paths to be used for database migration.
     *
     * @var array<string, string[]>
     */
    'paths' => array(

        /**
         * @var array
         */
        'migrations' => array(
            $root . '/src/Phinx/Scripts',
        ),

        /**
         * @var array
         */
        'seeds' => array(
            $root . '/src/Phinx/Seeders',
        ),

    ),

    // ...

);
```

When creating or performing database migrations using `Phinx`, always use the configuration file provided by `Basilisk`:

``` bash
$ vendor/bin/phinx create CreateUsersTable -c app/config/phinx.php
```

### Weasley

[Weasley](https://github.com/rougin/weasley) is a utility package in PHP that provides generators, helpers, and utilities for Slytherin. The following packages are also configured within `Basilisk`:

* `Laravel\Eloquent` enables the usage of [Eloquent](https://laravel.com/docs/eloquent) to `Basilisk` which is an [Object-relational mapper (ORM)](https://en.wikipedia.org/wiki/Object%E2%80%93relational_mapping) from [Laravel](https://laravel.com). To use this package, kindly install its required package first in `Composer`:

  ``` bash
  $ composer require illuminate/database
  ```

* `Laravel\Blade` allows `Basilisk` to use [Blade](https://laravel.com/docs/blade) from `Laravel` for creating PHP templates using the `Blade` templating engine. To use this package, kindly uncomment its related code first in the `app/config/app.php` file:

  ``` php
  // app/config/app.php

  // ...

  /**
   * This section specifies the core integrations that are
   * required to run in Slytherin. The following will use
   * the defined HTTP variables, available HTTP routes, and
   * the specified HTTP middlewares (if they're available).
   */
  'Rougin\Slytherin\Http\HttpIntegration',
  'Rougin\Slytherin\Integration\ConfigurationIntegration',
  'Rougin\Slytherin\Middleware\MiddlewareIntegration',
  'Rougin\Slytherin\Routing\RoutingIntegration',
  // 'Rougin\Slytherin\Template\RendererIntegration', // comment this line

  /**
   * This section specifies the packages came from Weasley.
   * Please see Weasley's documentation for all of its
   * available packages and integrations that can be used.
   *
   * @link https://roug.in/weasley/
   */
  'Rougin\Weasley\Packages\Laravel\Eloquent',
  'Rougin\Weasley\Packages\Laravel\Blade', // uncomment this line
  ```

  Then proceed to install its required package from `Composer`:

  ``` bash
  $ composer require illuminate/view
  ```

  Once installed, the `Blade` templates can now be added in the `app/blades` directory:

  ``` php
  // app/blades/index.blade.php

  @extends('main')

  @section('content')
    <div class="container">
      <div class="p-5">
        <h1 class="text-center">Hello, Muggle!</h1>
      </div>
    </div>
  @endsection
  ```

## Directory structure

The following directory names below are only the preferred names [based on my experience](https://roug.in/work/) building projects using `Slytherin`. However, they can be easily be extended or removed as `Slytherin` not does not conform to any of the specified preferences:

```
src/
├─ Checks/
├─ Depots/
├─ Models/
├─ Phinx/
│  ├─ Scripts/
│  ├─ Seeders/
├─ Routes/
├─ Scripts/
```

### `Checks`

This directory contains PHP classes that are used specifically for validation. The said PHP classes may be extended to the `Check` class of [Weasley](https://roug.in/weasley/):

``` php
namespace App\Checks;

use Rougin\Weasley\Check;

class UserCheck extends Check
{
    /**
     * @var array<string, string>
     */
    protected $labels =
    [
        'name' => 'Name',
        'email' => 'Email',
    ];

    /**
     * @var array<string, string>
     */
    protected $rules =
    [
        'name' => 'required',
        'email' => 'required|email',
    ];
}
```

> [!NOTE]
> For more information on how to create a validation class, please see the [Validation section](https://github.com/rougin/weasley?tab=readme-ov-file#validation) of the `Weasley` documentation.

### `Depots`

This is the main directory that should contain the business logic of `Basilisk`:

``` php
namespace App\Depots;

use App\Models\User;

class UserDepot
{
    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return array<string, mixed>[]
     */
    public function all()
    {
        $result = $this->user->all();

        $items = array();

        // ...

        return $items;
    }
}
```

Prior in using depots, I implemented most of the logic in the `Routes` or `Models` directories. However, it presents a challenge to me in organizing code when implementing new features. In using depots, I can reuse the same logic in to either `Routes` (for receiving user request) or in `Scripts` directory (for handling terminal-based actions).

> [!NOTE]
> In other PHP frameworks and other guides, `Depot` is also known as the [Repository pattern](https://designpatternsphp.readthedocs.io/en/latest/More/Repository/README.html).

### `Models`

This is the directory where for storing the models (if using [`Eloquent`](https://laravel.com/docs/eloquent)) or entities (if using [`Doctrine`](https://www.doctrine-project.org/index.html)). In my experience, my best practice is that the class names added in this directory should represent a database table (e.g., if having a `users` table from the database, it should be represented in `Basilisk` as `User` class):

``` php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @var string[]
     */
    protected $fillable =
    [
        'name',
        'password',
        'email',
    ];

    /**
     * @var string[]
     */
    protected $hidden =
    [
        'password'
    ];

    /**
     * @var string
     */
    protected $table = 'users';
}

```

> [!NOTE]
> As `Basilisk` provided a `User` model based on `Eloquent`, kindly see its [official discussion](https://laravel.com/docs/eloquent) for its usage and configuration.

### `Phinx`

This is the directory for the storage of related files to the [Phinx](https://phinx.org/) package. The `Scripts` directory must contain the generated database migrations while the `Seeders` directory must contain the custom database seeders:

``` php
// src/Phinx/Scripts/20171012020230_create_users_table.php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    public function change(): void
    {
        $properties = ['id' => false, 'primary_key' => ['id']];

        $table = $this->table('users', $properties);

        $table->addColumn('id', 'integer', ['limit' => 10, 'identity' => true]);
        $table->addColumn('name', 'string', ['limit' => 200]);
        $table->addColumn('email', 'string', ['limit' => 200]);
        $table->addColumn('password', 'string', ['limit' => 500]);
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime', ['null' => true]);

        $table->create();
    }
}
```

``` php
// src/Phinx/Seeders/UserSeeder.php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    protected $items =
    [
        ['name' => 'Harry Jonathans Potter', 'email' => 'hjpotter@hogwarts.co.uk'],
        ['name' => 'Hermione Jane Granger', 'email' => 'hjgranger@hogwarts.co.uk'],
        ['name' => 'Ronald Bilius Weasley', 'email' => 'rbweasley@hogwarts.co.uk'],
    ];

    public function run(): void
    {
        $data = array();

        foreach ($this->items as $item)
        {
            $item['created_at'] = date('Y-m-d H:i:s');

            $data[] = $item;
        }

        $this->table('users')->insert($data)->save();
    }
}
```

This directory will also be used for performing database migrations and its seeders. To perform a database migration, kindly run the `migrate` command:

``` bash
$ vendor/bin/phinx migrate -c app/config/phinx.php
```

The `seed:run` command can be used for populating data in a database:

``` bash
$ vendor/bin/phinx seed:run -c app/config/phinx.php
```

When executed, the command above will perform the database seeders in **alphabetical** order.

> [!NOTE]
> Before performing any database migrations from `Phinx`, kindly update the database credentials first in `.env`:
>
> ``` bash
> $ cp .env.example .env
> ```

### `Routes`

This is the gateway of `Basilisk` wherein the [HTTP routes](https://github.com/rougin/slytherin/wiki/Defining-HTTP-Routes) are stored and configured as a PHP class. The PHP class can call or instantiate the classes found from the previously mentioned directories:

``` php
namespace App\Routes;

use Rougin\Slytherin\Template\RendererInterface;

class Hello
{
    /**
     * Returns the "Hello, Muggle!" text.
     *
     * @return string
     */
    public function index(RendererInterface $renderer)
    {
        return $renderer->render('index');
    }
}
```

Once a HTTP route was created to the directory, it should be added to the `Router` for it to be recognized by `Slytherin`:

``` php
namespace App;

use Rougin\Slytherin\Routing\Router as Slytherin;

class Router extends Slytherin
{
    /**
     * @var string
     */
    protected $namespace = 'App\Routes';

    /**
     * @var string
     */
    protected $prefix = '/';

    /**
     * @return \Rougin\Slytherin\Routing\RouteInterface[]
     */
    public function routes()
    {
        $this->get('/', 'Hello@index');

        // ...

        return $this->routes;
    }
}
```

> [!NOTE]
> In other PHP frameworks, `Routes` is commonly known as `Controllers`.

### `Scripts`

This is the directory to store commands or scripts. These scripts can be executed directly using the `php` command in the terminal:

``` php
// src/Scripts/HelloWorld.php

echo 'Hello world!';
```

``` bash
$ php src/Scripts/HelloWorld.php

Hello world!
```

## Development workflow

`Basilisk` also provides unit testing and static code analysis out of the box when implementing new features to minimize the introduction of errors during development. It also has an opinionated coding style which can be configured after the installation.

### Unit testing

The sample unit tests provided in `Basilisk` were written in [PHPUnit](https://phpunit.de/index.html):

``` bash
$ composer test
```

It is recommended to run the above command to always check if the updated code introduces errors when creating fixes or implementing new features.

> [!NOTE]
> Please see the [official documentation](https://phpunit.de/documentation.html) of `PHPUnit` on how to write unit tests to the specified testing framework.

### Code quality

To retain the code quality of `Basilisk`, a static code analysis code tool named [PHPStan](https://phpstan.org/) can be used during development. To start, kindly install the specified package in the global environment of `Composer`:

``` bash
$ composer global require phpstan/phpstan --dev
```

Once installed, `PHPStan` can now be run using its namesake command:

``` bash
$ phpstan
```

> [!NOTE]
> When running `phpstan`, it will use the `phpstan.neon` file which is already provided by `Basilisk`.

### Coding style

Aside from code quality, `Basilisk` also uses a tool named [PHP Coding Standards Fixer](https://cs.symfony.com/) for maintaining an opinionated style guide. To use this tooling, it needs also to be installed in the `Composer`'s global environment first:

``` bash
$ composer global require friendsofphp/php-cs-fixer --dev
```

After its installation, kindly use the `php-cs-fixer` command in the same `Authsum` directory:

``` bash
$ php-cs-fixer fix --config=phpstyle.php
```

The `phpstyle.php` file provided by `Basilisk` currently follows the [PSR-12](https://www.php-fig.org/psr/psr-12/) standard as its baseline for the coding style and uses [Allman](https://en.wikipedia.org/wiki/Indentation_style#Allman_style) as its indentation style.

> [!NOTE]
> Installing both `PHPStan` and `PHP Coding Standards Fixer` requires a minimum version of PHP at least `7.4`.

## Changelog

Please see [CHANGELOG][link-changelog] for more information what has changed recently.

## License

The MIT License (MIT). Please see [LICENSE][link-license] for more information.

[ico-build]: https://img.shields.io/github/actions/workflow/status/rougin/basilisk/build.yml?style=flat-square
[ico-coverage]: https://img.shields.io/codecov/c/github/rougin/basilisk?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rougin/basilisk.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/rougin/basilisk.svg?style=flat-square

[link-build]: https://github.com/rougin/basilisk/actions
[link-changelog]: https://github.com/rougin/basilisk/blob/master/CHANGELOG.md
[link-contributors]: https://github.com/rougin/basilisk/contributors
[link-coverage]: https://app.codecov.io/gh/rougin/basilisk
[link-downloads]: https://packagist.org/packages/rougin/basilisk
[link-license]: https://github.com/rougin/basilisk/blob/master/LICENSE.md
[link-packagist]: https://packagist.org/packages/rougin/basilisk
[link-upgrading]: https://github.com/rougin/basilisk/blob/master/UPGRADING.md
# Basilisk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]
[![Build Status][ico-build]][link-build]
[![Coverage Status][ico-coverage]][link-coverage]
[![Total Downloads][ico-downloads]][link-downloads]

Basilisk is a project skeleton specifically for the [Slytherin](https://roug.in/slytherin/) micro-framework which provides an opinionated code structure that is based on [my experiences](https://roug.in/) creating projects using Slytherin as its foundation. The code structure should be easy to understand and be under [SOLID](https://en.wikipedia.org/wiki/SOLID) principles.

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

To run the project in a web browser, the [PHP's built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php) can be used:

``` bash
$ php -S localhost:80 -t app/public
```

After running, open a web browser then proceed to http://localhost in a new tab.

> [!WARNING]
> This command should only be used for development purposes. It is recommended to use [Apache](https://httpd.apache.org/) or [Nginx](https://nginx.org/en/) in running this project.

## What's inside?

`Basilisk` contains a configuration of the following packages:

### Slytherin

[Slytherin](https://github.com/rougin/slytherin) is a simple and extensible PHP micro-framework that tries to achieve a [SOLID-based design](https://en.wikipedia.org/wiki/SOLID) for creating web applications. Being the project's foundation, `Basilisk` has also configured the following of its packages out of the box:

* [HttpIntegration](https://github.com/rougin/slytherin/wiki/Http) allows to use PHP's superglobals (e.g., `$_GET`, `$_POST`, etc.) to the project;
* [ConfigurationIntegration](https://github.com/rougin/slytherin/wiki/IntegrationInterface-Implementation) allows to use the `Configuration` class of Slytherin across the project through dependency injection;
* [MiddlewareIntegration](https://github.com/rougin/slytherin/wiki/Middleware) provides a simple way in integrating [PSR-15](https://www.php-fig.org/psr/psr-15/) middlewares;
* [RoutingIntegration](https://github.com/rougin/slytherin/wiki/Routing) adds a systematic way of configuring HTTP routes and its routers; and
* [RendererIntegration](https://github.com/rougin/slytherin/wiki/Template) for providing directories in loading PHP templates.

### Weasley

[Weasley](https://github.com/rougin/weasley) is a utility package that provides generators, helpers, and utilities for Slytherin. The following packages are also configured within a `Basilisk` project:

* `Laravel\Eloquent` enables to usage of [Eloquent](https://laravel.com/docs/11.x/eloquent) to the project. To use this package, kindly install its required package first in `Composer`:

``` bash
$ composer require illuminate/database
```

* `Laravel\Blade` allows a `Basilisk` project to use [Blade](https://laravel.com/docs/11.x/blade) for creating PHP templates using the `Blade` template engine. To use this package, kindly uncomment its related code first in the `app/config/app.php` file:

``` diff
 /**
  * This section specifies the packages came from Weasley.
  * Please see Weasley's documentation for all of its
  * available packages and integrations that can be used.
  *
  * @link https://roug.in/weasley/
  */
- 'Rougin\Weasley\Packages\Laravel\Eloquent',
+ // 'Rougin\Weasley\Packages\Laravel\Blade',
```

Then proceed to install its required package from `Composer`:

``` bash
$ composer require illuminate/view
```

Once installed, kindly the `Blade` templates in the `app/blades` directory:

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

### 

| Package | Description |
| ------- | ----------- |
| [Blade](https://laravel.com/docs/blade) | A templating engine provided by [Laravel](https://laravel.com/) |
| [Eloquent](https://laravel.com/docs/eloquent) | An object-relational mapper (ORM) by [Laravel](https://laravel.com/) |
| [Dotenv](https://github.com/vlucas/phpdotenv) | Loads variables from `.env` to `getenv()` |
| [Phinx](https://phinx.org/) | A PHP database migrations for everyone |
| [Slytherin](https://roug.in/slytherin/) | An extensible and SOLID-based micro-framework |
| [Weasley](https://roug.in/weasley/) | Generators and helpers for Slytherin |

## Directory Structure

> [!NOTE]
> The following directory names below are only the preferred names based on my experience building projects under Slytherin. But they can be easily be extended or removed as Slytherin not does not conform to those said preferences.

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

### Checks

```
src/
├─ Checks/
```

This directory contains classes that are used for validation. Those classes may be extended to the `Check` class of [Weasley](https://roug.in/weasley/):

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

### Depots

```
src/
├─ Depots/
```

The main directory that should contain the logic of a project:

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

        foreach ($result as $item)
        {
            $row = ['id' => $item->id];

            $row['name'] = $item->name;

            $row['email'] = $item->email;

            $items[] = $row;
        }

        return $items;
    }
}
```

> [!NOTE]
> Prior in using depots, or may be best known as the [Repository pattern](https://designpatternsphp.readthedocs.io/en/latest/More/Repository/README.html), I implemented most of the logic in the `Routes` or `Models` directories. However, it presents a challenge to me in organizing their code. With using depots, I can reuse the same logic in to either `Routes` (for receiving user request) or in `Scripts` directory (for handling terminal-based actions).

### Models

```
src/
├─ Models/
```

It is the directory where for storing the models (for [`Eloquent`](https://laravel.com/docs/eloquent)) or entities (if using [`Doctrine`](https://www.doctrine-project.org/index.html)). The classes in this directory should represent a database table (e.g., if having a `users` table, it should be represented as `User` class):

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

### Phinx

```
src/
├─ Phinx/
│  ├─ Scripts/
│  ├─ Seeders/
```

This directory is for the storage of related files for the [`Phinx` package](https://phinx.org/). The `Scripts` directory contains the generated database migrations while the `Seeders` directory must contain the database seeders.

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

The said directory will be used for running the database migrations and seeders. To migrate the database scripts, kindly run the `migrate` command:

``` bash
$ vendor/bin/phinx migrate -c app/config/phinx.php
```

> [!NOTE]
> Before running scripts from `Phinx`, kindly update the database credentials first in `.env`:
>
> ``` bash
> $ cp .env.example .env
> ```

The `seed:run` command can be used for populating data in a database:

``` bash
$ vendor/bin/phinx seed:run -c app/config/phinx.php
```

> [!NOTE]
> The command above will load the seeders in **alphabetical** order.

### Routes

```
src/
├─ Routes/
```

The gateway of the project wherein the routes are stored. The said class can call or instantiate the classes found from the previously mentioned directories.

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

> [!NOTE]
> In other frameworks, `Routes` is commonly known as `Controllers`.

### Scripts

```
src/
├─ Scripts/
```

The directory where the scripts are stored. These scripts can be executed directly using the `php` command in the terminal:

``` php
// src/Scripts/HelloWorld.php

echo 'Hello world!';
```

``` bash
$ php src/Scripts/HelloWorld.php

Hello world!
```

## Changelog

Please see [CHANGELOG][link-changelog] for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

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
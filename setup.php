#!/usr/bin/env php

<?php

// Reference: https://github.com/spatie/package-skeleton-laravel

/**
 * @param string $question
 * @param string $default
 *
 * @return string
 */
function ask($question, $default = '')
{
    $text = $default ? " ({$default})" : null;

    $answer = readline($question . $text . ': ');

    return $answer ? $answer : $default;
}

/**
 * @param string  $question
 * @param boolean $default
 *
 * @return boolean
 */
function confirm($question, $default = false)
{
    $answer = ask($question . ' (' . ($default ? 'Y/n' : 'y/N') . ')');

    return $answer ? strtolower($answer) === 'y' : $default;
}

/**
 * @param string   $path
 * @param string[] $files
 *
 * @return void
 */
function empty_dir($path, $files = array())
{
    if (! file_exists($path))
    {
        return;
    }

    $dir = new RecursiveDirectoryIterator($path, 4096);

    $iterator = new RecursiveIteratorIterator($dir, 2);

    /** @var \SplFileInfo $file */
    foreach ($iterator as $file)
    {
        $path = $file->getRealPath();

        // Check if file is excluded ----------
        $excluded = false;

        foreach ($files as $item)
        {
            if (strpos($path, $item) !== false)
            {
                $excluded = true;
            }
        }

        if ($excluded)
        {
            continue;
        }
        // ------------------------------------

        if ($file->isDir())
        {
            rmdir($path);

            continue;
        }

        unlink($path);
    }
}

/**
 * @return string[]
 */
function get_src_files()
{
    $source = __DIR__ . '/src';

    /** @var string[] */
    $files = glob("$source/**/**.php");

    /** @var string[] */
    $main = glob("$source/**.php");

    /** @var string[] */
    return array_merge($files, $main);
}

/**
 * @param string $name
 * @param string $author
 *
 * @return string
 */
function guess_link($name, $author)
{
    $author = guess_username($author);

    $texts = explode(' ', $name);
    $name = strtolower($texts[0]);

    $link = $author . '/' . $name;

    return 'https://github.com/' . $link;
}

/**
 * @param string $name
 * @param string $author
 *
 * @return string
 */
function guess_namespace($name, $author)
{
    $author = guess_username($author);
    $author = ucfirst($author);

    $texts = explode(' ', $name);
    $name = ucfirst($texts[0]);

    return $author . '\\' . $name;
}

/**
 * @param string $author
 *
 * @return string
 */
function guess_username($author)
{
    $texts = explode(' ', $author);

    return strtolower($texts[0]);
}

/**
 * @param string $path
 *
 * @return void
 */
function remove_dir($path)
{
    empty_dir($path);

    if (file_exists($path))
    {
        rmdir($path);
    }
}

/**
 * @param string $file
 *
 * @return void
 */
function remove_file($file)
{
    if (! file_exists($file) || ! is_file($file))
    {
        return;
    }

    unlink($file);
}

/**
 * @param string                $file
 * @param array<string, string> $texts
 *
 * @return void
 */
function replace_in_file($file, $texts)
{
    $contents = file_get_contents($file);

    $keys = array_keys($texts);

    $values = array_values($texts);

    $parsed = str_replace($keys, $values, $contents);

    file_put_contents($file, $parsed);
}

/**
 * @param string $command
 *
 * @return string
 */
function run($command)
{
    return trim((string) shell_exec($command));
}

$name = ask('Name of project:', 'App');
$desc = ask('Project description', 'A Basilisk app');
$author = ask('Project author', 'Rougin Gutib');
$email = ask('Email of author', 'rougingutib@gmail.com');
$guess = guess_namespace($name, $author);
$namespace = ask('Project namespace:', $guess);
$guess = guess_link($name, $author, $email);
$link = ask('URL to the project', $guess);
$version = ask('Initial version', '0.1.0');

$useAssets = confirm('Use "assets" folder?');
$useCache = confirm('Use "cache" folder?');
$useBlade = confirm('Use Laravel Blade?');
$useEloquent = confirm('Use Laravel Eloquent?');
$rmSample = confirm('Remove sample data?', true);

$confim = confirm('Apply these changes?', true);

if (! $confim)
{
    return;
}

$rmSelf = confirm('Delete this file after?', true);

// Change details in README.md -------------
$readme = __DIR__ . '/README';

if (file_exists($readme . '.bak'))
{
    copy($readme . '.bak', $readme . '.md');
}

remove_file($readme . '.bak');

$texts = array('[NAME]' => $name);
$texts['[AUTHOR]'] = $author;
$texts['[DESCRIPTION]'] = $desc;
$texts['[LINK]'] = $link;

replace_in_file($readme . '.md', $texts);
// -----------------------------------------

// Change details in CHANGELOG.md -----
$changelog = __DIR__ . '/CHANGELOG.md';

$texts = array('[NAME]' => $name);

$texts['[VERSION]'] = $version;

replace_in_file($changelog, $texts);
// ------------------------------------

// Change details in composer.json ---------------
$composer = __DIR__ . '/composer';

if (file_exists($composer . '.bak'))
{
    copy($composer . '.bak', $composer . '.json');
}

$texts = array('[NAME]' => $name);
$texts['[EMAIL]'] = $email;
$texts['[LINK]'] = $link;
$texts['[S_NAME]'] = strtolower($name);
$texts['[USERNAME]'] = guess_username($author);
$texts['[AUTHOR]'] = $author;
$texts['[DESCRIPTION]'] = $desc;
$parsed = str_replace('\\', '\\\\', $namespace);
$texts['[NAMESPACE]'] = $parsed;

remove_file($composer . '.bak');

replace_in_file($composer . '.json', $texts);

run('composer dump-autoload');
// -----------------------------------------------

// Change details in Router.php ---------------
$router = __DIR__ . '/src/Router';

if ($rmSample && file_exists($router . '.bak'))
{
    copy($router . '.bak', $router . '.php');

    remove_file($router . '.bak');
}
// --------------------------------------------

// Search PHP files with @package and @author --------------
$texts = array('[NAME]' => $name);
$texts['[EMAIL]'] = $email;
$texts['[AUTHOR]'] = $author;
$texts['namespace = \'App'] = 'namespace = \'' . $namespace;
$texts['namespace App'] = 'namespace ' . $namespace;

foreach (get_src_files() as $file)
{
    replace_in_file($file, $texts);
}
// ---------------------------------------------------------

remove_dir(__DIR__ . '/.github');

$app = __DIR__ . '/app';
$src = __DIR__ . '/src';
$space = str_repeat(' ', 8);

// Replace namespace in "index.php" -------------
$index = $app . '/public/index.php';
$texts = array('use App' => 'use ' . $namespace);

replace_in_file($index, $texts);
// ----------------------------------------------

// Replace names in "blades" and "plates" folder ------------
$texts = array('Basilisk' => $name);
$text = 'A skeleton application for the Slytherin framework';
$texts[$text] = $desc;
$texts['Muggle'] = $author;

replace_in_file($app . '/plates/index.php', $texts);

replace_in_file($app . '/blades/index.blade.php', $texts);
// ----------------------------------------------------------

if (! $useAssets)
{
    remove_dir($app . '/assets');
}

$config = $app . '/config';

if (! $useBlade)
{
    remove_dir($app . '/blades');

    remove_file($config . '/illuminate.php');
}

// Replace namespace in "app.php" ------------
$texts = array('App' => $namespace);

replace_in_file($config . '/app.php', $texts);
// -------------------------------------------

if ($useBlade)
{
    $blade = "'Rougin\Weasley\Packages\Laravel\Blade'";

    $render = "'Rougin\Slytherin\Template\RendererIntegration'";

    $texts = array();

    $texts[$space . $render] = $space . '// ' . $render;
    $texts[$space . '// ' . $blade] = $space . $blade;

    replace_in_file($config . '/app.php', $texts);

    remove_dir($app . '/plates');

    run('composer require illuminate/view');

    // Always use "cache" folder ---
    $useCache = true;
    // -----------------------------
}

if (! $useCache)
{
    remove_dir($app . '/cache');
}

if ($useEloquent)
{
    run('composer require illuminate/database');
}

if (! $useEloquent)
{
    $text = "'Rougin\Weasley\Packages\Laravel\Eloquent'";

    $texts = array($space . $text => $space . '// ' . $text);

    replace_in_file($config . '/app.php', $texts);
}

if ($rmSample)
{
    empty_dir($src . '/Phinx/Scripts', array('.gitignore'));

    empty_dir($src . '/Phinx/Seeders', array('.gitignore'));

    remove_dir($app . '/sample');

    remove_file($src . '/Routes/Users.php');

    empty_dir($src . '/Depots', array('.gitignore'));

    empty_dir($src . '/Models', array('.gitignore'));
}

if ($rmSelf)
{
    remove_file(__FILE__);
}

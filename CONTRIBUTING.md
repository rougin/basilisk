# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via **Pull requests** on [Github](https://github.com/rougin/slytherin-skeleton).

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Running Tests

``` bash
$ wget http://selenium-release.storage.googleapis.com/2.53/selenium-server-standalone-2.53.1.jar
$ wget http://chromedriver.storage.googleapis.com/2.9/chromedriver_linux64.zip
$ unzip chromedriver_linux64.zip
$ chmod +x chromedriver
$ cp .env.example .env
$ java -jar selenium-server-standalone-2.53.1.jar -port 4444 &
$ php -S localhost:8000 -t public/ &
$ composer test
```

**Happy coding**!

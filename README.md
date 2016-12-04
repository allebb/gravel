Gravel
======

[![Build Status](https://travis-ci.org/allebb/gravel.svg)](https://travis-ci.org/allebb/gravel)
[![Code Coverage](https://scrutinizer-ci.com/g/allebb/gravel/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/allebb/gravel/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/gravel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/gravel/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/gravel/badges/gpa.svg)](https://codeclimate.com/github/allebb/gravel)
[![Latest Stable Version](https://poser.pugx.org/ballen/gravel/v/stable)](https://packagist.org/packages/ballen/gravel)
[![Latest Unstable Version](https://poser.pugx.org/ballen/gravel/v/unstable)](https://packagist.org/packages/ballen/gravel)
[![License](https://poser.pugx.org/ballen/gravel/license)](https://packagist.org/packages/ballen/gravel)

[Gravel](https://github.com/allebb/gravel) is a PHP library for working with [Gravatar](http://www.gravatar.com) avatars.

Gravel is written and maintained by [Bobby Allen](http://bobbyallen.me), the library is licensed under the [MIT license](LICENSE).

Requirements
------------

This library is developed and tested for PHP 5.3+

This library is unit tested against PHP 5.3, 5.4, 5.5, 5.6, HHVM and 7.0!

License
-------

This client library is released under the MIT license, a [copy of the license](https://github.com/allebb/gravel/blob/master/LICENSE) is provided in this package.

Installation
------------

The recommended way of installing Gravel is via. [Composer](http://getcomposer.org); To install using Composer type the following command at the console:

```shell
composer require ballen/gravel
```

Alternately you can add it to your ``composer.json`` file manually in the `require` section like so:

```php
"ballen/gravel": "^2.0"
```
Then install the package by running the ``composer update ballen/gravel`` command.

You can also manually download the latest version as a [zip](https://github.com/allebb/gravel/archive/master.zip) or [tar.gz](https://github.com/allebb/gravel/archive/master.tar.gz) archive of the library from GitHub and 'include' the `Gravatar.php` script (library) and use it standalone if you wish.

### Laravel 4 and 5 Integration

Gravel has optional support for [Laravel](http://www.laravel.com) 4.x and 5.x and comes with a **Service Provider** which will register the **Facade** for easy integration.

Open your Laravel application configuration file ``config/app.php`` (or ``app/config/app.php`` if you are using Laravel 4.x)and add the following lines.

In the `$providers` array add the service providers for this package.

```php
Ballen\Gravel\GravelServiceProvider::class,
```

The Gravatar package will now be autoloaded by the Laravel framework (via. Composer) and use of the library is as simple...

Example usage
-------------

If you have installed the library using Composer or manually you can (as long as your application already `requires` or `includes` the composer `autoload.php`) then you can instantiate a new object instance and use it immediately in your application like so:

```php
use Ballen\Gravel\Gravatar;

$avatar = new Gravatar('bobbyallen.uk@gmail.com');
$avatar->setSize(100); // We want a 100x100px sized avatar instead of the default 120x120px

/**
* You can then obtain the avatar URL either by using the buildGravatarUrl() method or utilising
* the __toString() class method like so:
*/
<image src="<?php echo $avatar; ?>">
```

There are a number of other "commented" examples on how you can utilise this library can be found in the ``examples/Examples.php`` file.

### Laravel example

I decided to implement a Laravel type style (`make()`, `get()`) for the Laravel Facades therefore it should keep both the hardcore developers (setter and getter prefixed methods) as well as those developers that appreciate cleanly written method names!

If you have added the Laravel Service Provider and Aliases as documented above, you can utilise the library like so:

```php
# Laravel 4.x example
return View::make('userprofile')
    ->with('gravatar', Gravatar::make('bobbyallen.uk@gmail.com')->size(200)->get());

# Laravel 5.x example (using the view() helper method)
return view('userprofile')
    ->with('gravatar', Gravatar::make('bobbyallen.uk@gmail.com')->size(200)->get());

```

Tests and coverage
------------------

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use [TravisCI](https://travis-ci.org/) for continuous integration, which triggers tests for PHP 5.3, 5.4, 5.5, 5.6, 7.0 and HHVM every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```shell
# Install the Gravel Library with the 'development' packages this then includes PHPUnit!
composer install --dev


# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be ran and a report generated (this does require XDebug to be installed)...

```shell
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().

Gravel
======

[Gravel](https://github.com/bobsta63/gravel) is a simple PHP library for working with [Gravatar](http://www.gravatar.com) avatars.

Gravel is written and maintained by [Bobby Allen](http://bobbyallen.me), the library is licensed under the [MIT license](LICENSE).

## Requirements

* PHP >= 5.3.0

## Installation

The recommended way of installing Gravel is via. [Composer](http://getcomposer.org). To install using Composer type the following command at the console:

```shell
composer require ballen/gravel
```

Alternately you can add it to your ``composer.json`` file manually in the `require` section like so:

```php
"ballen/gravel": "^1.2"
```
Then install the package by running the ``composer update ballen/gravel`` command.

You can also manually download the latest version as a [zip](https://github.com/bobsta63/gravel/archive/master.zip) or [tar.gz](https://github.com/bobsta63/gravel/archive/master.tar.gz) archive of the library from GitHub and 'include' the `Gravatar.php` script (library) and use it standalone if you wish.

### Laravel 4 Integration

Gravel has optional support for [Laravel](http://www.laravel.com) 4.x and comes with a **Service Provider** and a **Facade** for easy integration.

Open your Laravel application configuration file `app/config/app.php` and add the following lines.

In the `$providers` array add the service providers for this package.

```php
'Ballen\Gravel\GravelServiceProvider',
```

Then add the facade of this package to the `$aliases` array.

```php
'Gravatar' => 'Ballen\Gravel\Facades\Gravatar',
```

The Gravatar package will now be autoloaded by the Laravel framework and use of the library is as simplified!

## Example usage

If you have installed the library using Composer or manually you can (as long as your application already `requires` or `includes` the composer `autoload.php`) then you can instantiate a new object instance and use it immediately in your application like so:

```php
use Ballen\Gravel\Gravatar;

$my_gravatar = new Gravatar;
$my_gravatar->setEmail('bobbyallen.uk@gmail.com')->setSize(200);

/**
* You can then call the generated image URL like so:-
* 
* <image src="<?php echo $my_gravatar->buildGravatarUrl(); ?>" alt="My avatar using Gravatar.com">
*
*/
```

### Laravel 4 examples

As Laravel's syntax is clean and simple, I decided to implement a Laravel type style (`make()`, `get()`) for the Laravel Facades therefore it should keep both the hardcore developers (setter and getter prefixed methods) as well as those developers that appreciate cleanly written method names!

If you have added the Laravel Service Provider and Aliases as documented above, you can utilise the library like so:

```php
return View::make('userprofile')
    ->with('gravatar', Gravatar::make('bobbyallen.uk@gmail.com')->size(200)->get());
```
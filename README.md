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

### Laravel 4 and 5 Integration

Gravel has optional support for [Laravel](http://www.laravel.com) 4.x and 5.x and comes with a **Service Provider** which will register the **Facade** for easy integration.

Open your Laravel application configuration file ``config/app.php`` (or ``app/config/app.php`` if you are using Laravel 4.x)and add the following lines.

In the `$providers` array add the service providers for this package.

```php
Ballen\Gravel\GravelServiceProvider::class,
```


The Gravatar package will now be autoloaded by the Laravel framework (via. Composer) and use of the library is as simple...

## Example usage

If you have installed the library using Composer or manually you can (as long as your application already `requires` or `includes` the composer `autoload.php`) then you can instantiate a new object instance and use it immediately in your application like so:

```php
use Ballen\Gravel\Gravatar;

$my_gravatar = new Gravatar;
$my_gravatar->setEmail('bobbyallen.uk@gmail.com')->setSize(200);

/**
* You can then call the generated image URL like so:-
* 
* <image src="<?php echo $my_gravatar->buildGravatarUrl(); ?>">
*
*/
```

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
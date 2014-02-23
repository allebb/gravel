Gravel
======

[Gravel](https://github.com/bobsta63/gravel) is a simple PHP library for [Gravatar.com](http://www.gravatar.com), it enables developers to easily access, display and manipulate user avatars (from Gravatar.com) in their applications.

Gravel is written and maintained by [Bobby Allen](http://bobbyallen.me), the library is licensed under the [MIT license](LICENSE).

## Requirements

* PHP >= 5.3.0

## Installation

Gravel is installable via. [Composer](http://getcomposer.org). Read further information on how to install.

```php
"ballen/gravel": "dev-master",
```
Then install the package by running the `composer install` or `composer update` command.

You can also manually download the latest version as a [zip]() or [tar.gz]() archive of the library from GitHub and 'include' the `Gravatar.php` script (library) and use it stand-alone if you wish.

It is however, recommended that you install it using Composer as you can keep this library up to date automatically updated as and when bug fixes and improvements are made etc.

### Laravel 4 Integration

Gravel has optional support for [Laravel](http://www.laravel.com) 4 and comes with a Service Provider and a Facade for easy integration.

Open your Laravel application configuration file `app/config/app.php` and add the following lines.

In the `$providers` array add the service providers for this package.

```php
'Ballen\Gravel\GravatarServiceProvider',
```

Then add the facade of this package to the `$aliases` array.

```php
'Gravatar' => 'Ballen\Gravel\Gravatar',
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
*/
<image src="<?php echo $my_gravatar->buildGravatarUrl(); ?>" alt="My avatar using Gravatar.com">
```

### Laravel 4 examples

As Laravel's syntax is clean and simple, I decided to implement a Laravel type style (`make()`, `get()`) for the Laravel Facades therefore it should keep both the hardcore developers (setter and getter prefixed methods) as well as those developers that appreciate cleanly written method names!

If you have added the Laravel Service Provider and Aliases as documented above, you can utilise the library like so:

```php
$my_gravatar = Gravatar::make('bobbyallen.uk@gmail.com')->size(200)->get();

return View::make('userprofile')->with('gravatar', $my_gravatar);
```

## Documentation

If you wish to see all of the avaliable methods, please see the [API docs](docs/index.html) which documents the methods.
<?php

namespace Ballen\Gravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * GravelMapper
 *
 * Gravatar Mapper provides a binding/class method aliases for Laravel to provide friendly syntax.
 *
 * @author ballen@bobbyallen.me (Bobby Allen)
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/gravel
 * @link http://www.bobbyallen.me
 *
 */
class Gravatar extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'gravatar';
    }
}

<?php

namespace Ballen\Gravel;

use Illuminate\Support\ServiceProvider;
use Ballen\Gravel\Facades\GravatarMapper;

/**
 * GravelMapper
 *
 * Gravatar Mapper provides a binding/class method aliases for Laravel to provide friendly syntax.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/gravel
 * @link http://www.bobbyallen.me
 *
 */
class GravelServiceProvider extends ServiceProvider
{

    /**
     * @codeCoverageIgnore
     **/
    public function register()
    {
        $this->app->bind(
            'gravatar',
            function () {
                return new GravatarMapper();
            }
        );
    }
}

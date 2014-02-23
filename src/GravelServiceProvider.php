<?php

namespace Ballen\Gravel;

use Illuminate\Support\ServiceProvider;
use Ballen\Gravel\Facades\GravatarMapper;

class GravelServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('gravatar', function() {
            return new GravatarMapper();
        });
    }

}

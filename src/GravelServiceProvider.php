<?php

namespace Ballen\Gravel;

use Illuminate\Support\ServiceProvider;
use Ballen\Gravel\Gravatar;
use Config;

class PowergateServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('domain', function() {
            return new Domain(Config::get('powergate.api.baseUrl', ''), Config::get('powergate.api.user', 'api'), Config::get('powergate.api.key', 'no_password_set'));
        });
        $this->app->bind('record', function() {
            return new Record(Config::get('powergate.api.baseUrl', ''), Config::get('powergate.api.user', 'api'), Config::get('powergate.api.key', 'no_password_set'));
        });
    }

}

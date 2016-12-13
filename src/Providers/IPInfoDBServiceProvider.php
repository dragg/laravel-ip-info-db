<?php

namespace Dragg\IPInfoDB\Providers;

use Dragg\IPInfoDB\IPInfoDB;
use Illuminate\Support\ServiceProvider;

class IPInfoDBServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('ip-info-db.php')
        ], 'config');

        $this->app[IPInfoDB::class] = function ($app) {
            return $app['wifi-planet.ip-info-db'];
        };
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['wifi-planet.ip-info-db'] = $this->app->share(function ($app) {

            return new IPInfoDB($this->config('key'));
        });
    }

    /**
     * Helper to get the config values.
     *
     * @param  string $key
     * @return string
     */
    protected function config($key, $default = null)
    {
        return config("ip-info-db.$key", $default);
    }
}

<?php


namespace Qbhy\AcrCloud;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class LaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setupConfig();

        $this->app->singleton(AcrCloud::class, function () {
            $config = config('acr');
            return new AcrCloud($config);
        });
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $configSource = dirname(__DIR__) . '/config/acr.php';
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                $configSource => config_path('acr.php')
            ]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('acr');
        }
        $this->mergeConfigFrom($configSource, 'acr');

    }
}
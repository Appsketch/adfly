<?php

namespace Appsketch\Adfly\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Appsketch\Adfly\Adfly;

/**
 * Class AdflyServiceProvider
 *
 * @package M44rt3np44uw\Adfly\Providers
 */
class AdflyServiceProvider extends ServiceProvider
{
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $this->_publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register Adlfy.
        $this->registerAdfly();

        // Merge config.
        $this->_mergeConfig();
    }

    /**
     * Register Adfly.
     */
    private function registerAdfly()
    {
        $this->app->bind('Appsketch\Adfly\Adfly', function()
        {
            return new Adfly();
        });
    }

    /**
     * Publish config.
     */
    private function _publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/adfly.php' => config_path('adfly.php')
        ]);
    }

    /**
     * Merge config.
     */
    private function _mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/adfly.php', 'adfly'
        );
    }
}

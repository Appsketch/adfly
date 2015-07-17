<?php

namespace Appsketch\Adfly\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Appsketch\Adfly\Adfly;

/**
 * Class AdflyServiceProvider
 *
 * @package Appsketch\Adfly\Providers
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
        $this->publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge config.
        $this->mergeConfig();

        // Register Adlfy.
        $this->registerAdfly();

        // Alias Adfly.
        $this->aliasAdfly();
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
    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/adfly.php' => config_path('adfly.php')
        ]);
    }

    /**
     * Merge config.
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/adfly.php', 'adfly'
        );
    }

    /**
     * Alias Adfly.
     */
    private function aliasAdfly()
    {
        if(!$this->aliasExists('Adfly'))
        {
            AliasLoader::getInstance()->alias(
                'Adfly',
                \Appsketch\Adfly\Facades\Adfly::class
            );
        }
    }

    /**
     * Check if an alias already exists in the IOC.
     *
     * @param $alias
     *
     * @return bool
     */
    private function aliasExists($alias)
    {
        return array_key_exists($alias, AliasLoader::getInstance()->getAliases());
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'Appsketch\Adfly\Adfly'
        ];
    }
}

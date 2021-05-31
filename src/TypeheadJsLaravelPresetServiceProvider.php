<?php

namespace Takielias\TypeheadJsLaravelPreset;

use Illuminate\Support\ServiceProvider;

class TypeheadJsLaravelPresetServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'takielias');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'takielias');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/typeheadjslaravelpreset.php', 'typeheadjslaravelpreset');

        // Register the service the package provides.
        $this->app->singleton('typeheadjslaravelpreset', function ($app) {
            return new TypeheadJsLaravelPreset;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['typeheadjslaravelpreset'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/typeheadjslaravelpreset.php' => config_path('typeheadjslaravelpreset.php'),
        ], 'typeheadjslaravelpreset.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/takielias'),
        ], 'typeheadjslaravelpreset.views');*/

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/../../../corejavascript/typeahead.js/dist' => public_path('vendor/takielias'),
        ], 'typeheadjslaravelpreset.views');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/takielias'),
        ], 'typeheadjslaravelpreset.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

<?php

namespace Onethirtyone\Core;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Onethirtyone\Core\Commands\CoreInstall;
use Onethirtyone\Core\Components\AppLayout;
use Onethirtyone\Core\Components\Navigation;
use Livewire\Livewire;
use Onethirtyone\Core\Livewire\ContactUs;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('core.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'core-config'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'core');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/core'),
        ]);

        $this->loadViewComponentsAs('core', [
            AppLayout::class,
            Navigation::class
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
               CoreInstall::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/public' => public_path('vendor/core'),
        ], 'core-public');

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('cms/core.php')
        ], 'core-config');

        Livewire::component('core::contact-us', ContactUs::class);
    }
}

<?php

namespace Vietstars\ClientDetect;

use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('client', function ($app) {
            return new Agent($app['request']->server());
        });

        $this->app->alias('client', Agent::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['client', Agent::class];
    }
}

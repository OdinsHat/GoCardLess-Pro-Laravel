<?php

namespace Fhferreira\GoCardLess;

use Illuminate\Support\ServiceProvider;
use GoCardlessPro\Environment;
use GoCardlessPro\Client;

class GoCardLessServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @access protected
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @access public
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config' => config_path('gocardless.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @access public
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('gocardless', function ($app) {
            
            $config = $app['config']->get('gocardless');

            $env = isset($config['environment']) ? $config['environment'] : null;

            $environment = \GoCardlessPro\Environment::SANDBOX;
            if ($env == 'live') {
                environment = \GoCardlessPro\Environment::LIVE;
            }

            $access_token = isset($config['access_token']) ? $config['access_token'] : null;

            return new \GoCardlessPro\Client(array(
              'access_token' => $access_token,
              'environment'  => environment
            ));
        });

        $this->app->alias('gocardless', 'GoCardlessPro\Client');
    }

    /**
     * Get the services provided by the provider.
     *
     * @access public
     * @return array
     */
    public function provides()
    {
        return array(
            'gocardless'
        );
    }
}
<?php namespace App\Social;

use Illuminate\Support\ServiceProvider;

class AuthenticatorServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'social');

        $this->publishes([
            __DIR__.'/Config/Authenticator.php' => config_path('authenticator.php'),
            __DIR__.'/Views' => base_path('resources/views/social'),
            __DIR__.'/Migrations' => base_path('database/migrations'),
        ]);

        $this->app->config->set('auth.model', $this->app->config->get('authenticator.model'));

        include __DIR__.'/routes.php';
    }

    public function register()
    {
        $this->app->bind('authenticator', function($app)
        {
            return $app->make('App\Social\AuthenticatorManager');
        });
        $this->registerSocialite();
        $this->registerUserModel();
    }

    public function registerSocialite()
    {
        $this->app->register('\Laravel\Socialite\SocialiteServiceProvider');
    }

    public function registerUserModel()
    {
        $this->app->make('App\Social\Models\User');
    }

    public function provides()
    {
        return [
            'App\Social\AuthenticatorManager',
            '\Laravel\Socialite\SocialiteServiceProvider',
        ];
    }
}
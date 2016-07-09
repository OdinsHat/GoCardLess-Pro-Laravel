#Laravel 4 GoCardLess package

Easily integrate your app with GoCardLess

Created and maintained by Flávio H. Ferreira. Copyright &copy; 2016. Licensed under the [MIT license]

In the $providers array add the following service provider for this package.

> 'Fhferreira\GoCardLess\GoCardLessServiceProvider',

In the $aliases array add the following facade for this package.

> 'GoCardLess' => 'Fhferreira\GoCardLess\Facades\GoCardLess',

Run the publish for create the config file on app/config/packages/fhferreira/gocardless-pro-laravel

> php artisan vendor:publish fhferreira/gocardless-pro-laravel

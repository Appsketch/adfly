# Laravel Adfly

[![Latest Stable Version](https://poser.pugx.org/appsketch/adfly/v/stable)](https://packagist.org/packages/appsketch/adfly) [![Total Downloads](https://poser.pugx.org/appsketch/adfly/downloads)](https://packagist.org/packages/appsketch/adfly) [![Latest Unstable Version](https://poser.pugx.org/appsketch/adfly/v/unstable)](https://packagist.org/packages/appsketch/adfly) [![License](https://poser.pugx.org/appsketch/adfly/license)](https://packagist.org/packages/appsketch/adfly)

## Installation

First, pull in the package through Composer.

```js
composer require appsketch/adfly
```

And then, if using Laravel 5.1, include the service provider within `app/config/app.php`.

```php
'providers' => [
    Appsketch\Adfly\Providers\AdflyServiceProvider::class,
]
```

if using Laravel 5. include this service provider.

```php
'providers' => [
    "Appsketch\Adfly\Providers\AdflyServiceProvider",
]
```

The alias will automatically set.

Publish the config file to the config folder with the following command.
`php artisan vendor:publish`.

Fill out the config file. Note, key and uid are required.
All configurations can be overwritten in the options array.

## Usage

Within, for example the routes.php add this.

```php
Route::get('/adfly', function()
{
    // Adfly options.
    $options = [
        'title' => 'Link to Google'
    ];

    // this will for example echo http://adf.ly/1KMh2Z.
    echo Adfly::create("http://www.google.com/", $options);
});
```
# Laravel Adfly

[![Latest Stable Version](https://poser.pugx.org/m44rt3np44uw/adfly/v/stable)](https://packagist.org/packages/m44rt3np44uw/adfly) [![Total Downloads](https://poser.pugx.org/m44rt3np44uw/adfly/downloads)](https://packagist.org/packages/m44rt3np44uw/adfly) [![Latest Unstable Version](https://poser.pugx.org/m44rt3np44uw/adfly/v/unstable)](https://packagist.org/packages/m44rt3np44uw/adfly) [![License](https://poser.pugx.org/m44rt3np44uw/adfly/license)](https://packagist.org/packages/m44rt3np44uw/adfly)

## Installation

First, pull in the package through Composer.

```js
"require": {
    "m44rt3np44uw/adfly": "dev-master"
}
```

And then, if using Laravel 5.1, include the service provider within `app/config/app.php`.

```php
'providers' => [
    M44rt3np44uw\Adfly\Providers\AdflyServiceProvider::class,
]
```

And, for convenience, add a facade alias to this smae file at the bottom:
```php
'aliases' => [
    'Adfly' => M44rt3np44uw\Adfly\Facades\Adfly::class,
];
```

if using Laravel 5. include this service provider.

```php
'providers' => [
    "M44rt3np44uw\Adfly\Providers\AdflyServiceProvider",
]
```

And this alias.
```php
'aliases' => [
    'Adfly' => "M44rt3np44uw\Adfly\Facades\Adfly",
];
```

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
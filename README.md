# Laravel Adfly

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

    // Echo the adfly url.
    echo Adfly::create("http://www.google.com/", $options);
});
```
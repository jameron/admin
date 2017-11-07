This package has been built to work with Laravel 5.4.33 and later. Some older versions may not be compatible. If you are starting fresh, create your laravel application first thing and install the regulator package. 

[jameron/regulator](https://github.com/jameron/regulator)

1) Add the package to your compose.json file:

```json
    "jameron/admin": "1.0.*",
```

```
composer update
```

**NOTE  Laravel 5.5+ users there is auto-discovery so you can ignore steps 2 and 3

2) Update your providers:

```php
    Jameron\Admin\AdminServiceProvider::class,
```

3) Update your Facades:

```php
        'Admin' => Jameron\Admin\Facades\RegulatorFacade::class,
```

4) Publish the config:

```
php artisan vendor:publish
```


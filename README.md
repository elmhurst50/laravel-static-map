# Laravel Static Map Image Generator

This is mainly a Laravel wrapper for another package that gets the maps, just makes it nice for the framework. I have not gone through it much at the moment as this package will do what I need it to at the moment.

### Installation

```sh
$ composer install samjoyce777/laravel-static-map --save
```

Add the service provider to the config.php

```sh
$ \samjoyce777\LaravelStaticMap\MapServiceProvider::class,
```

Add the facade as well to make it all pretty

```sh
$ 'Map' => \samjoyce777\LaravelStaticMap\Facades\Map::class,
```

Move the config file to make your customizations

```sh
$ php artisan vendor:publish --tag=config
```

### Usage

This will return URL of a map with default settings of London
```sh
Map::getMap(51.5085300, -0.1257400);
```

This will get return URL of map generated with 'large' settings in the config.
```sh
Map::getMap(51.5085300, -0.1257400, 'large');
```

This will get return URL of map generated with 'large' settings in the config, with some overrides.
```sh
Map::getMap(51.5085300, -0.1257400, 'large', ['zoom' => 3, 'type' => 'hybrid');
```



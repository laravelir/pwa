- [![Starts](https://img.shields.io/github/stars/laravelir/pwa?style=flat&logo=github)](https://github.com/laravelir/pwa/forks)
- [![Forks](https://img.shields.io/github/forks/laravelir/pwa?style=flat&logo=github)](https://github.com/laravelir/pwa/stargazers)
  [![Total Downloads](https://img.shields.io/packagist/dt/laravelir/pwa.svg?style=flat-square)](https://packagist.org/packages/laravelir/pwa)


# laravelir/pwa

pwa for laravel

### Installation / Use

1. Run the command below to add this package:

```
composer require laravelir/pwa
```

2. Open your config/app.php and add the following to the providers array:

```php
Laravelir\Pwa\Providers\PwaServiceProvider::class,
```

3. Run the command below to install the package:

```
php artisan pwa:install
```

4. open pwa.php config file and fill your configs and run bellow command to generate manifest.json file:
```php
php artisan pwa:generate
```

5. and add pwa directives to your master file:
```php
<html>
<head>
    <title>My Pwa Project</title>
    ...
    
    @pwa_metas
</head>
<body>
    ...
    My content
    ...
    
    @pwa_sw
</body>
</html> 
```

6. create offline view and route:




### Services



### Features

safari support

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

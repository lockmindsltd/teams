# Lockminds Teams

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lockminds/teams.svg?style=flat-square)](https://packagist.org/packages/lockminds/teams)
[![Total Downloads](https://img.shields.io/packagist/dt/lockminds/teams.svg?style=flat-square)](https://packagist.org/packages/lockminds/teams)

Lockminds Teams is a package for Laravel Application for managing Teams and Tasks

## Dependencies
```bash
1. laravel-permission
2. kreait/laravel-firebase
3. fightbulc/moment
```

## Installation

You can install the package via composer:

```bash
composer require lockminds/teams
```

## Usage

``` php
NOTE: This package is under early development and is not ready for prime-time.

```
### Once installed you can do stuff like this:
First, add the Spatie\Permission\Traits\HasRoles trait to your User model(s):
```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // ...
}
```
Second, Config laravel-firebase
```dotenv
FIREBASE_CREDENTIALS=/full/path/to/firebase_credentials.json
# or
FIREBASE_CREDENTIALS=relative/path/to/firebase_credentials.json
```


If you are installing package for first time it is recommended you run the package command below, this will do for you publishing, migration and seeding.
```bash
php artisan lockminds:install
```

If you are updating form previous version run
```bash
php artisan lockminds:update
```

If you are installing package for first time and you don\'t want automation of publishing, migration and seeding run below command
```bash
php artisan lockminds:install-minimal
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email canwork.job@gmail.com instead of using the issue tracker.

## Credits

- [Kelvin Benard](https://github.com/lockminds)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

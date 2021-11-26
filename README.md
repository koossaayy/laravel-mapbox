# Easily Integration of Mapbox inside your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/koossaayy/laravel-mapbox/run-tests?label=tests)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/koossaayy/laravel-mapbox/Check%20&%20fix%20styling?label=code%20style)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)

---
This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-mapbox.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-mapbox)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require koossaayy/laravel-mapbox
```


You can publish the config file with:
```bash
php artisan vendor:publish --tag="mapbox-config"
```


This is the contents of the published config file:

```php
return [
    'mapbox_token' => (env('MAPBOX_TOKEN', null))
];
```

## Usage

```php
$laravel-mapbox = new Koossaayy\LaravelMapbox();
echo $laravel-mapbox->echoPhrase('Hello, Koossaayy!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [koossaayy](https://github.com/koossaayy)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

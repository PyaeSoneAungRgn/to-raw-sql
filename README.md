[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/PyaeSoneAungRgn/to-raw-sql/run-tests.yml?branch=main&label=test)](https://github.com/PyaeSoneAungRgn/to-raw-sql/actions/workflows/run-tests.yml)

# To Raw Sql

Get raw SQL from Laravel Query Builder

## Installation

```bash
composer require pyaesoneaung/to-raw-sql
```

## Usage

```php
User::where('votes', '>', 100)
    ->orWhere(function ($query) {
        $query->where('name', 'Abigail')
            ->where('votes', '>', 50);
    })
    ->toRawSql();

// "select * from `users` where `votes` > 100 or (`name` = Abigail and `votes` > 50)"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Pyae Sone Aung](https://github.com/PyaeSoneAungRgn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

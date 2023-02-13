[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/PyaeSoneAungRgn/to-raw-sql/run-tests.yml?branch=main&label=test)](https://github.com/PyaeSoneAungRgn/to-raw-sql/actions/workflows/run-tests.yml)

# To Raw SQL

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

// "select * from `users` where `votes` > 100 or (`name` = 'Abigail' and `votes` > 50)"
```

```php
DB::table('users')
   ->whereBetween('votes', [1, 100])
   ->toRawSql();

// "select * from `users` where `votes` between 1 and 100"
```

## Why?
`toSql()` doesn't bind values to it. Instead, it returns the raw SQL representation of the query as a string, including placeholders for any bound values.

In some cases, you might want to inspect the actual SQL, with the values already bound to the placeholders. 

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

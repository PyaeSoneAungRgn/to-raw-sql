[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/PyaeSoneAungRgn/to-raw-sql/run-tests.yml?branch=main&label=test)](https://github.com/PyaeSoneAungRgn/to-raw-sql/actions/workflows/run-tests.yml)
[![Packagist Downloads](https://img.shields.io/packagist/dt/pyaesoneaung/to-raw-sql)](https://packagist.org/packages/pyaesoneaung/to-raw-sql)

# To Raw SQL

Get raw SQL from Laravel Query Builder and Eloquent Builder

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

## Version History

- 1.1.2
  - throw ToRawSqlException when encountering PostgreSQL jsonb operator errors 
- 1.1.1
  - fixed boolean bind for pgsql
- 1.1.0
  - support Illuminate\Database\Query\Builder
- 1.0.2
  - support DateTimeInterface bind
- 1.0.1
  - fixed string bind
- 1.0.0
  - support Illuminate\Database\Eloquent\Builder

## Testing

```bash
composer test
```

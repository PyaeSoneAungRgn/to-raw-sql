<?php

namespace PyaeSoneAung\ToRawSql;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ToRawSqlServiceProvider extends PackageServiceProvider
{
    public function boot(): void
    {
        Builder::macro('toRawSql', function (): string {
            /** @var \Illuminate\Database\Eloquent\Builder $this */
            $bindings = [];
            foreach ($this->getBindings() as $value) {
                if (is_string($value)) {
                    $bindings[] = "'{$value}'";
                } else {
                    $bindings[] = $value;
                }
            }

            return Str::replaceArray('?', $bindings, $this->toSql());
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('to-raw-sql');
    }
}

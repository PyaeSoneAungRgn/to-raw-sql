<?php

namespace PyaeSoneAung\ToRawSql;

use PyaeSoneAung\ToRawSql\Concerns\EloquentBuilderMacros;
use PyaeSoneAung\ToRawSql\Concerns\QueryBuilderMacros;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ToRawSqlServiceProvider extends PackageServiceProvider
{
    use EloquentBuilderMacros, QueryBuilderMacros;

    public function boot(): void
    {
        $this->registerEloquentBuilderMacros();
        $this->registerQueryBuilderMacros();
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

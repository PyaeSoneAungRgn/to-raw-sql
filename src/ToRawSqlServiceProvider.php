<?php

namespace PyaeSoneAung\ToRawSql;

use PyaeSoneAung\ToRawSql\Concerns\EloquentBuilderMacros;
use PyaeSoneAung\ToRawSql\Concerns\QueryBuilderMacros;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Foundation\Application;

class ToRawSqlServiceProvider extends PackageServiceProvider
{
    use EloquentBuilderMacros;
    use QueryBuilderMacros;

    public function boot(): void
    {
        // skip if laravel version is greater than 10.14.1
        if (version_compare(Application::VERSION, '10.14.1', '<=') === true) {
            $this->registerEloquentBuilderMacros();
            $this->registerQueryBuilderMacros();
        }
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

<?php

namespace PyaeSoneAung\ToRawSql;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ToRawSqlServiceProvider extends PackageServiceProvider
{
    public function boot(): void
    {
        Builder::macro('toRawSql', function (): string {
            /**
             * @var \Illuminate\Database\Eloquent\Builder $this
             */
            $bindings = $this->getBindings();
            foreach ($bindings as $key => $value) {
                if ($value instanceof DateTimeInterface) {
                    $bindings[$key] = "'{$value->format('Y-m-d H:i:s')}'";
                } elseif (is_bool($value)) {
                    $bindings[$key] = (int) $value;
                } elseif (is_string($value)) {
                    $bindings[$key] = "'{$value}'";
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

<?php

namespace PyaeSoneAung\ToRawSql\Concerns;

use Illuminate\Database\Eloquent\Builder;
use PyaeSoneAung\ToRawSql\Services\BuilderToRawSqlService;

trait EloquentBuilderMacros
{
    public function registerEloquentBuilderMacros()
    {
        Builder::macro('toRawSql', function (): string {
            /**
             * @var \Illuminate\Database\Eloquent\Builder $this
             */
            return (new BuilderToRawSqlService($this))->toRawSql();
        });
    }
}

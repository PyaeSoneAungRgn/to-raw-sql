<?php

namespace PyaeSoneAung\ToRawSql\Concerns;

use Illuminate\Database\Query\Builder;
use PyaeSoneAung\ToRawSql\Services\BuilderToRawSqlService;

trait QueryBuilderMacros
{
    public function registerQueryBuilderMacros()
    {
        Builder::macro('toRawSql', function (): string {
            /**
             * @var \Illuminate\Database\Query\Builder $this
             */
            return (new BuilderToRawSqlService($this))->toRawSql();
        });
    }
}

<?php

namespace PyaeSoneAung\ToRawSql\Concerns;

use Illuminate\Database\Query\Builder;
use PyaeSoneAung\ToRawSql\Services\BuilderToRawSqlService;

trait QueryBuilderMacros
{
    public function registerQueryBuilderMacros(): void
    {
        Builder::macro('toRawSql', function (): string {
            /**
             * @var \Illuminate\Database\Query\Builder $this
             */
            return (new BuilderToRawSqlService(
                builder: $this
            ))->toRawSql();
        });
    }
}

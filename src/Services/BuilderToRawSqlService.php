<?php

namespace PyaeSoneAung\ToRawSql\Services;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Str;

class BuilderToRawSqlService
{
    public function __construct(
        public EloquentBuilder|QueryBuilder $builder
    ) {
    }

    public function toRawSql(): string
    {
        $bindings = $this->builder->getBindings();
        foreach ($bindings as $key => $value) {
            if ($value instanceof DateTimeInterface) {
                $bindings[$key] = "'{$value->format('Y-m-d H:i:s')}'";
            } elseif (is_string($value)) {
                $bindings[$key] = "'{$value}'";
            } elseif (is_bool($value)) {
                $bindings[$key] = $value ? 'true' : 'false';
            }
        }

        return Str::replaceArray('?', $bindings, $this->builder->toSql());
    }
}

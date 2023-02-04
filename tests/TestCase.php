<?php

namespace PyaeSoneAung\ToRawSql\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use PyaeSoneAung\ToRawSql\ToRawSqlServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ToRawSqlServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}

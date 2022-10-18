<?php

namespace Hareland\LaravelImmutableAttributes\Tests;

use Hareland\LaravelImmutableAttributes\LaravelImmutableAttributesServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class LaravelTestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate', [
            '--database' => 'testbench',
            //Compensate for being loaded from the vendor package dir.
            '--path' => '../../../../tests/example_immutable_model_migration.php',
        ])->run();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelImmutableAttributesServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
<?php

namespace Onethirtyone\Core\Tests;

use Illuminate\Support\Facades\Config;
use Onethirtyone\Core\CoreServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * Class TestCase.
 */
class TestCase extends Orchestra
{
    /**
     * Setup.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            CoreServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('core.owner.email', 'robb@131studios.com');
    }
}

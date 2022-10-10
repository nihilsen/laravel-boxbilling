<?php

namespace Nihilsen\FOSSBilling\Tests;

use Illuminate\Support\Facades\Http;
use Nihilsen\FOSSBilling\ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * {@inheritDoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function defineEnvironment($app)
    {
        /** @var \Illuminate\Config\Repository */
        $config = $app['config'];

        $config->set('fossbilling', [
            'url' => 'https://fossbilling.invalid/api',
            'token' => 'token',
        ]);

        Http::preventStrayRequests();
    }
}

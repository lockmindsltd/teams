<?php

namespace Lockminds\Teams\Tests;

use Orchestra\Testbench\TestCase;
use Lockminds\Teams\TeamsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TeamsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}

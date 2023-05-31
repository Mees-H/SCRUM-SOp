<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;    
    /**
    * Indicates whether the default seeder should run before each test.
    *
    * @var bool
    */
   protected $seed = true;
    use CreatesApplication;

    function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        if ($this->app) {
            foreach ($this->beforeApplicationDestroyedCallbacks as $callback) {
                call_user_func($callback);
            }
        }
    }
}

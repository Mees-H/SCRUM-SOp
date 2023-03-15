<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Unit\OldMailFactoryTests;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}

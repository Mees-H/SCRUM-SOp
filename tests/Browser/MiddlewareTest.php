<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use SebastianBergmann\Type\VoidType;
use Tests\DuskTestCase;

class MiddlewareTest extends DuskTestCase
{
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('#navbarDropdown')
                    ->clickLink('Log Out')
                    ->assertSee('Login');
        });
    }

    public function testLogoutNavigation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events')
                    ->assertSee('Forbidden');
        });
    }
    
}

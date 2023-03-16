<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EnrollForEventTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testFormSuccess(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '01-01-2000')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', 'Teststraat 1')
                    ->type('city', 'Teststad')
                    ->type('disability', 'Geen')
                    ->type('event_id', '1')
                    ->press('Aanmelden')
                    ->assertSee('Uw aanmelding is verzonden!');
        });
    }
}

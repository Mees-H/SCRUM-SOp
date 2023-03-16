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
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', 'Teststraat 1')
                    ->type('city', 'Teststad')
                    ->type('disability', 'Geen')
                    ->type('event_id', '1')
                    ->press('aanmeldknop')
                    ->assertSee('Uw aanmelding is verzonden!');
        });
    }

    public function testFormWrongAddress(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', '=Teststraat; 1')
                    ->type('city', 'Teststad')
                    ->type('disability', 'Geen')
                    ->type('event_id', '1')
                    ->press('aanmeldknop')
                    ->assertSee('500');
        });
    }

    public function testFormWrongCity(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', '=Teststraat; 1')
                    ->type('city', 'Teststad1')
                    ->type('disability', 'Geen')
                    ->type('event_id', '1')
                    ->press('aanmeldknop')
                    ->assertSee('500');
        });
    }

    public function testFormWrongDisability(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', '=Teststraat; 1')
                    ->type('city', 'Teststad')
                    ->type('disability', 'Geen')
                    ->type('event_id', '1')
                    ->press('aanmeldknop')
                    ->assertSee('500');
        });
    }
}

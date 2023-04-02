<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EnrollForEventTest extends DuskTestCase
{
    public function testFormSuccess(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('#aanmeldknop')
                ->assertSee('Uw aanmelding is verzonden!');
        });
    }

    public function testFormFailed(): void
    {
        $this->browse(function (Browser $browser) {
            // Event ID validation
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id') + 1))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
}

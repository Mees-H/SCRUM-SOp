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
            $browser->visit('/aanmelden')
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', 'Teststraat 1')
                    ->type('city', 'Teststad')
                    ->type('disability', 'Geen')
                    ->type('event_id', DB::table('events')->min('id'))
                    ->press('aanmeldknop')
                    ->assertSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadId_shouldFail(): void
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
                ->type('event_id', DB::table('events')->max('id') + 1)
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadName_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test4;drop table users;')
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->type('event_id', '1')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadBirthday_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', 'ajnfdskjnjafnknsjdkfbg b')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->type('event_id', '1')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadEmail_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'adsbfiobadsuygbfoulabfuygbdfvhybalxbvudsblyuierub')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->type('event_id', '1')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadPhoneNumber_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '456as4df54fd65a4sdf65saf')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->type('event_id', '1')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadAddress_shouldFail(): void
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
                    ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadCity_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/aanmelden')
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', '=Teststraat; 1')
                    ->type('city', 'Teststad1231 ;dsafnjs;1')
                    ->type('disability', 'Geen')
                    ->type('event_id', '1')
                    ->press('aanmeldknop')
                    ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

}

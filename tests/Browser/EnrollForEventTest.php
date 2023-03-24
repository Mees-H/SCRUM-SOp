<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use RefreshDatabase;

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
                    ->press('aanmeldknop')
                    ->assertSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadId_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id') + 1))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadName_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 300; $i++) {
                $string .= 'a';
            }
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', $string)
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadBirthday_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', 'ajnfdskjnjafnknsjdkfbg b')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadEmail_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'adsbfiobadsuygbfoulabfuygbdfvhybalxbvudsblyuierub')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadPhoneNumber_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '456as4df54fd65a4sdf65saf')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('disability', 'Geen')
                ->press('aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadAddress_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', '')
                    ->type('city', 'Teststad')
                    ->type('disability', 'Geen')
                    ->press('aanmeldknop')
                    ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadCity_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 300; $i++) {
                $string .= 'a';
            }
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                    ->assertSee('Inschrijven voor Evenement')
                    ->type('name', 'Test')
                    ->type('birthday', '2000-01-01')
                    ->type('email', 'test@gmail.com')
                    ->type('phonenumber', '0612345678')
                    ->type('address', 'Teststraat 6')
                    ->type('city', $string)
                    ->type('disability', 'Geen')
                    ->press('aanmeldknop')
                    ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

}

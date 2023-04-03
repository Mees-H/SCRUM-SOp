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

    public function testForm_BadName_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 256; $i++) {
                $string .= 'a';
            }
            //Test required field
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', '')
                ->type('email', 'test@gmail.com')
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->waitForText('Uw naam is verplicht');

            //Test max length
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', $string)
                ->type('email', 'test@gmail.com')
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->waitForText('Uw naam mag niet langer zijn dan 255 karakters');
        });
    }

    public function testForm_BadEmail_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 256; $i++) {
                $string .= 'a';
            }

            $email = 'adsbfiobadsuygbfoulabfuygbdfvhybalxbvudsblyuierub';

            //Test required field
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', '')
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->waitForText('Uw email is verplicht');


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

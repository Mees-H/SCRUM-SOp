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
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen');
            $browser
                ->waitFor('#aanmeldknop')
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
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', '')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test max length
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', $string)
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadBirthday_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            //Test required field
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test before today
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->waitFor('#aanmeldknop')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '01-01-2999')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadEmail_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 256; $i++) {
                $string .= 'a';
            }

            //Test required field
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');

            $browser
                ->waitFor('#aanmeldknop')
                ->waitFor('#aanmeldknop')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', '')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test e-mail validation
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->waitFor('#aanmeldknop')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'adsbfiobadsuygbfoulabfuygbdfvhybalxbvudsblyuierub')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test max length
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->waitFor('#aanmeldknop')
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', $string)
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadPhoneNumber_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 256; $i++) {
                $string .= '1';
            }

            //Test required field
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '456as4df54fd65a4sdf65saf')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test phonenumber regex
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', ';[]_=asdffda151256124-+()sdfsaf')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test minimal length
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '061234567')
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test max length
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', $string)
                ->type('address', 'Teststraat 1')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_BadAddress_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 256; $i++) {
                $string .= 'a';
            }

            //Test required field
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', '')
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test max length
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', $string)
                ->type('city', 'Teststad')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
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

            //Test required field
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 6')
                ->type('city', '')
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');

            //Test max length
            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 6')
                ->type('city', $string)
                ->type('golfhandicap', 'Geen')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }

    public function testForm_emptyGolfhandicap_shouldSucceed(): void
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/events/enroll/' . (DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser
                ->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 6')
                ->type('city', 'Teststad')
                ->type('golfhandicap', '')
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertSee('Uw aanmelding is verzonden!');
        });
    }
    public function testForm_BadGolfhandicap_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 300; $i++) {
                $string .= 'a';
            }


            //Test max length
            $browser->visit('/events/enroll/'.(DB::table('events')->max('id')))
                ->maximize()
                ->pause(1000);
            $browser->script('window.scrollTo(0, 1000);');
            $browser->assertSee('Inschrijven voor Evenement')
                ->type('name', 'Test')
                ->type('birthday', '2000-01-01')
                ->waitFor('#GenderMan')
                ->click('#GenderMan')
                ->type('email', 'test@gmail.com')
                ->type('phonenumber', '0612345678')
                ->type('address', 'Teststraat 6')
                ->type('city', 'Teststad')
                ->type('golfhandicap', $string)
                ->waitFor('#aanmeldknop')
                ->click('#aanmeldknop')
                ->assertDontSee('Uw aanmelding is verzonden!');
        });
    }
}

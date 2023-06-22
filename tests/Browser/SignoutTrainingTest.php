<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Faker\Core\DateTime;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SignoutTrainingTest extends DuskTestCase
{
    public function testFormSuccess(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/training/signout')
                ->resize(3000,3000)
                ->assertSee('Afmelden voor training')
                ->type('name', 'Piet Piraat')
                ->type('date', Carbon::tomorrow()->format('dmY'))
                ->press('Afmelden')
                ->waitForText('U heeft zich successvol afgemeld.');
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
            $browser->visit('/training/signout')
                ->resize(3000,3000)
                ->assertSee('Afmelden voor training')
                ->type('date', Carbon::tomorrow()->format('dmY'))
                ->press('Afmelden')
                ->assertPathIs('/training/signout');

            //Test max length
            $browser->visit('/training/signout')
                ->resize(3000,3000)
                ->assertSee('Afmelden voor training')
                ->type('name', $string)
                ->type('date', Carbon::tomorrow()->format('dmY'))
                ->press('Afmelden')
                ->waitForText('Uw naam mag niet langer zijn dan 255 karakters');
        });
    }

    public function testForm_BadDate_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 256; $i++) {
                $string .= 'a';
            }

            //Test required field
            $browser->visit('/training/signout')
                ->resize(3000,3000)
                ->assertSee('Afmelden voor training')
                ->type('name', 'Piet Piraat')
                ->press('Afmelden')
                ->assertPathIs('/training/signout');

            //Test before today
            $browser->visit('/training/signout')
                ->resize(3000,3000)
                ->assertSee('Afmelden voor training')
                ->type('name', 'Piet Piraat')
                ->type('date', Carbon::yesterday()->format('dmY'))
                ->press('Afmelden')
                ->waitForText('De datum moet na de datum van vandaag liggen');
        });
    }
}

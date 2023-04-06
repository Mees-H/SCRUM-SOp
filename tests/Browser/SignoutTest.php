<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SignoutTest extends DuskTestCase
{
    public function testFormSuccess(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/training/signout')
                ->assertSee('Afmelden voor training')
                ->type('name', 'Piet Piraat')
                ->type('date', '06062023')
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
                ->assertSee('Afmelden voor training')
                ->type('date', '06062023')
                ->press('Afmelden')
                ->waitForText('Uw naam is verplicht');

            //Test max length
            $browser->visit('/training/signout')
                ->assertSee('Afmelden voor training')
                ->type('name', $string)
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
                ->assertSee('Afmelden voor training')
                ->type('name', 'Piet Piraat')
                ->press('Afmelden')
                ->waitForText('De datum is verplicht');

            //Test before today
            $browser->visit('/training/signout')
                ->assertSee('Afmelden voor training')
                ->type('name', 'Piet Piraat')
                ->type('date', '06062002')
                ->press('Afmelden')
                ->waitForText('De datum moet na de datum van vandaag liggen');
        });
    }
}

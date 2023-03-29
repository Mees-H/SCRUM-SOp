<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SendQuestionTest extends DuskTestCase
{
    public function testFormSuccess(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', 'test@gmail.com')
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->assertSee('Uw vraag is verzonden!');
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

            // //Test e-mail validation
            // $browser->visit('/faq/vraagformulier/')
            //     ->assertSee('Stel een vraag')
            //     ->type('name', 'Test')
            //     ->type('email', 'adsbfiobadsuygbfoulabfuygbdfvhybalxbvudsblyuierub')
            //     ->type('question', 'Hoe werkt de evenementen pagina?')
            //     ->press('verstuurknop')
            //     ->

            //Test max length
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', $string)
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->waitForText('Uw email mag niet langer zijn dan 255 karakters');
        });
    }

    public function testForm_BadQuestion_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $string = '';
            for ($i = 0; $i < 501; $i++) {
                $string .= 'a';
            }

            //Test required field
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', 'test@gmail.com')
                ->type('question', '')
                ->press('verstuurknop')
                ->waitForText('Het invoeren van de vraag is verplicht');

            //Test max length
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', 'test@gmail.com')
                ->type('question', $string)
                ->press('verstuurknop')
                ->waitForText('Uw vraag mag niet langer zijn dan 500 karakters');
        });
    }
}
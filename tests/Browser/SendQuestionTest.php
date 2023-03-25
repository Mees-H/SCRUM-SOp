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
            for ($i = 0; $i < 300; $i++) {
                $string .= 'a';
            }
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', $string)
                ->type('email', 'test@gmail.com')
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->assertDontSee('Uw vraag is verzonden!');
        });
    }

    public function testForm_BadEmail_shouldFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', 'adsbfiobadsuygbfoulabfuygbdfvhybalxbvudsblyuierub')
                ->type('question', 'Hoe werkt de evenementen pagina?')
                ->press('verstuurknop')
                ->assertDontSee('Uw vraag is verzonden!');
        });
    }
}
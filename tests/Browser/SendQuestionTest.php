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

    public function testFormFailed(): void
    {
        $this->browse(function (Browser $browser) {
            // Question validation
            $browser->visit('/faq/vraagformulier/')
                ->assertSee('Stel een vraag')
                ->type('name', 'Test')
                ->type('email', 'test@gmail.com')
                ->type('question', '')
                ->press('verstuurknop')
                ->waitForText('Het invoeren van de vraag is verplicht');
        });
    }
}
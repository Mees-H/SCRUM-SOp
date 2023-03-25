<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FAQTest extends DuskTestCase
{
    public function testSendQuestionRoute(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->clickLink("Stel een vraag")
                    ->assertPathIs("/faq/vraagformulier");
        });
    }
}
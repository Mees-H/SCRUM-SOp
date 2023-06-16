<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class FooterTest extends DuskTestCase
{
    public function testFormSuccess(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/footer/edit/')
                ->resize(3000,3000)
                ->assertSee('Footer aanpassen')
                ->type('email', 'test@gmail.com')
                ->type('rekeningnummer', 'NL 38 RABO 123456789')
                ->type('KvKnr', '12345678')
                ->type('RSIN', '123456789')
                ->press('footerknop')
                ->assertRedirect('/footer/edit/');
        });
    }

}

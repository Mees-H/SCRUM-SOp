<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BannerTest extends DuskTestCase
{

    public function testUpdateBannerNoPic(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/banners')
                    ->resize(3000,3000)
                    ->press('@aanpassen')
                    ->press('@upload')
                    ->assertSee('Je moet een afbeelding selecteren');
        });
    }
}

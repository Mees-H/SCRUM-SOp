<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteSitemapTest extends DuskTestCase
{
    public function testDeleteSitemap():void{
        $this->browse(function (Browser $browser) {
            $browser->visit('/links')
                ->press('Verwijderen')
                ->assertPathIs("/links")
                ->assertSee("Link verwijderd.");
        });
    }
}

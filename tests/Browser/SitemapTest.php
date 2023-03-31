<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SitemapTest extends DuskTestCase
{
    public function testSitemap(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/links')
                ->clickLink("trainingen")
                ->assertPathIs("/training");
            $browser->visit('/links')
                ->clickLink("team")
                ->assertPathIs("/team");
        });
    }
}

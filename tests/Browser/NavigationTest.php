<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NavigationTest extends DuskTestCase
{
    public function testNavigation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink("Hoofdpagina")
                    ->assertPathIs("/index");
            $browser->visit('/')
                    ->clickLink("Trainingen")
                    ->assertPathIs("/training");
            $browser->visit('/')
                    ->clickLink("Evenementen")
                    ->assertPathIs("/evenement");
            $browser->visit('/')
                    ->clickLink("Galerij")
                    ->clickLink("2023")
                    ->assertPathIs("/galerij/2023");
            $browser->visit('/')
                    ->clickLink("Galerij")
                    ->clickLink("2022")
                    ->assertPathIs("/galerij/2022");
            $browser->visit('/')
                    ->clickLink("Galerij")
                    ->clickLink("2021")
                    ->assertPathIs("/galerij/2021");
            $browser->visit('/')
                    ->clickLink("Aanmelden")
                    ->assertPathIs("/aanmelden");
            $browser->visit('/')
                    ->clickLink("FAQ")
                    ->assertPathIs("/faq");
            $browser->visit('/')
                    ->clickLink("Nieuwsbrief")
                    ->assertPathIs("/nieuwsbrief");
            $browser->visit('/')
                    ->clickLink("Team")
                    ->assertPathIs("/team");
            $browser->visit('/')
                    ->clickLink("Partner")
                    ->assertPathIs("/partner");
            $browser->visit('/')
                    ->clickLink("Over Ons")
                    ->assertPathIs("/overons");
            $browser->visit('/')
                    ->clickLink("Locatie")
                    ->assertPathIs("/locatie");
            $browser->visit('/')
                    ->clickLink("Links")
                    ->assertPathIs("/links");
        });
    }

    public function testSearch() : void
    {

        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Hoofdpagina")
                        ->assertPathIs("/index");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Trainingen")
                        ->assertPathIs("/training");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Evenementen")
                        ->assertPathIs("/evenement");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Galerij")
                        ->clickLink("2023")
                        ->assertPathIs("/galerij/2023");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Galerij")
                        ->clickLink("2022")
                        ->assertPathIs("/galerij/2022");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Galerij")
                        ->clickLink("2021")
                        ->assertPathIs("/galerij/2021");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Aanmelden")
                        ->assertPathIs("/aanmelden");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("FAQ")
                        ->assertPathIs("/faq");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Nieuwsbrief")
                        ->assertPathIs("/nieuwsbrief");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Team")
                        ->assertPathIs("/team");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Partner")
                        ->assertPathIs("/partner");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Over Ons")
                        ->assertPathIs("/overons");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Locatie")
                        ->assertPathIs("/locatie");
                $browser->visit('/')
                        ->click(".search")
                        ->clickLink("Links")
                        ->assertPathIs("/links");
            });
        });
    }
}

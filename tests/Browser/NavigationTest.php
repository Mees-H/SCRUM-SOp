<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NavigationTest extends DuskTestCase
{
    public function testNavigation(): void
    {
        $this->browse(function (Browser $browser) {
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownActiviteiten")
                        ->clickLink("Trainingen")
                        ->assertPathIs("/training");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownActiviteiten")
                        ->clickLink("Evenementen")
                        ->assertPathIs("/evenement");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownGalerij")
                        ->clickLink("2021")
                        ->assertPathIs("/albums/2021");
                $browser->visit('/')->resize(3000,3000)
                        ->clickLink("Veelgestelde vragen")
                        ->assertPathIs("/vragenantwoorden");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownNieuws")
                        ->clickLink("Nieuwsartikelen")
                        ->assertPathIs("/nieuwsartikel");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownNieuws")
                        ->clickLink("Nieuwsbrieven")
                        ->assertPathIs("/nieuwsbrief");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Team")
                        ->assertPathIs("/team");
                $browser->visit('/')->resize(3000,3000)
                        ->clickLink("Partners")
                        ->assertPathIs("/partners");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Over Ons")
                        ->assertPathIs("/overons");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Locatie")
                        ->assertPathIs("/locatie");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Links")
                        ->assertPathIs("/links");
        });
    }

    public function testSearch() : void
    {

        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Hoofdpagina")
                        ->assertPathIs("/");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Trainingen")
                        ->assertPathIs("/training");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Evenementen")
                        ->assertPathIs("/evenement");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
//                        ->clickLink("Galerij")
                        ->clickLink("2023")
                        ->assertPathIs("/albums/2023");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
//                        ->clickLink("Galerij")
                        ->clickLink("2022")
                        ->assertPathIs("/albums/2022");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
//                        ->clickLink("Galerij")
                        ->clickLink("2021")
                        ->assertPathIs("/albums/2021");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("FAQ")
                        ->assertPathIs("/vragenantwoorden");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Nieuwsartikelen")
                        ->assertPathIs("/nieuwsartikel");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Nieuwsbrieven")
                        ->assertPathIs("/nieuwsbrief");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Team")
                        ->assertPathIs("/team");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Partner")
                        ->assertPathIs("/partners");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Over Ons")
                        ->assertPathIs("/overons");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Locatie")
                        ->assertPathIs("/locatie");
                $browser->visit('/')->resize(3000,3000)
                        ->type('#dropdown',' ')
                        ->clickLink("Links")
                        ->assertPathIs("/links");
            });
        });
    }

    public function testNavigationAdmin(): void
    {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
                $browser->loginAs(User::find(1));
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownActiviteiten")
                        ->clickLink("Trainingen")
                        ->assertPathIs("/trainingsessions");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownActiviteiten")
                        ->clickLink("Evenementen")
                        ->assertPathIs("/events");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownFotos")
                        ->clickLink("Galerij")
                        ->assertPathIs("/galerij");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownFotos")
                        ->clickLink("Slider")
                        ->assertPathIs("/slider");
                $browser->visit('/')->resize(3000,3000)
                        ->clickLink("Veelgestelde vragen")
                        ->assertPathIs("/faq");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownNieuws")
                        ->clickLink("Nieuwsartikelen")
                        ->assertPathIs("/nieuwsartikel");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownNieuws")
                        ->clickLink("Nieuwsbrieven")
                        ->assertPathIs("/nieuwsbrief");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Team")
                        ->assertPathIs("/members");
                $browser->visit('/')->resize(3000,3000)
                        ->clickLink("Partners")
                        ->assertPathIs("/groups");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Over Ons")
                        ->assertPathIs("/overons");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Locatie")
                        ->assertPathIs("/locatie");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Links")
                        ->assertPathIs("/links");
                $browser->visit('/')->resize(3000,3000)
                        ->click("#navbarDropdownOrganisatie")
                        ->clickLink("Gebruikers")
                        ->assertPathIs("/admin/gebruikers");

        });
    }
}

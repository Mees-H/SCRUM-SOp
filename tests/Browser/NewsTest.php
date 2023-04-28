<?php

namespace Tests\Browser;

use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseTruncation;

class NewsTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function testCreateArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser ) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuws')
                    ->clickLink("Nieuw artikel")
                    ->type('title', 'test')
                    ->type('date', '552023')
                    ->type('body', 'test')
                    ->attach('img[]', public_path('storage/img/teammembers/wim.jpeg'))
                    ->attach('file[]', public_path('storage/files/nieuws/31-01-2023.pdf'))
                    ->press('Voeg artikel toe')
                    ->assertPathIs('/nieuws')
                    ->assertSee('Artikel opgeslagen');

        });
    }

    public function testFailCreateArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser ) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuws')
                    ->clickLink("Nieuw artikel")
                    ->press('Voeg artikel toe')
                    ->assertPathIs('/nieuws/create')
                    ->assertSee('Het titel veld is verplicht.')
                    ->assertSee('Het datum veld is verplicht.')
                    ->assertSee('Het beschrijving veld is verplicht.');

        });
    }

    public function testEditArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser ) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuws')
                    ->clickLink("Pas nieuwsartikel aan")
                    ->type('title', 'test')
                    ->type('date', '552023')
                    ->type('body', 'test')
                    ->attach('img[]', public_path('storage/img/teammembers/wim.jpeg'))
                    ->attach('file[]', public_path('storage/files/nieuws/31-01-2023.pdf'))
                    ->press('Voeg artikel toe')
                    ->assertPathIs('/nieuws')
                    ->assertSee('Artikel opgeslagen');

        });
    }

    public function testFailEditArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser ) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuws')
                    ->clickLink("Pas nieuwsartikel aan")
                    ->type('title', '')
                    ->type('date', '')
                    ->type('body', '')
                    ->press('Voeg artikel toe')
                    ->assertPathIs('/nieuws/*/edit')
                    ->assertSee('Het titel veld is verplicht.')
                    ->assertSee('Het datum veld is verplicht.')
                    ->assertSee('Het beschrijving veld is verplicht.');

        });
    }

    public function testDeleteArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser ) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuws')
                    ->press("Verwijder nieuwsartikel")
                    ->assertPathIs('/nieuws')
                    ->assertSee('Artikel verwijderd.');

        });
    }
}
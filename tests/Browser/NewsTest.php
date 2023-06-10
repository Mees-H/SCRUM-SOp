<?php

namespace Tests\Browser;

use App\Models\NewsArticle;
use App\Models\NewsLetter;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseTruncation;

class NewsTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function testNieuwsArtikelPage(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser)
        {
            $browser->visit('/')
                ->resize(3000, 3000)
                ->clickLink('Nieuws')
                ->assertSee('Nieuws')
                ->press("2023")
                ->waitUntilEnabled('@click_article')
                ->assertSee('Activiteiten 2023')
                ->click('@fullscreen')
                ->assertPathIs('/nieuws');
        });
    }


    public function testCreateArticle(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsartikel')
                ->resize(3000, 3000)
                ->clickLink("Nieuw artikel")
                ->type('title', 'test')
                ->type('date', '552023')
                ->type('body', 'test')
                ->attach('img[]', base_path('tests/Browser/TestImage/GolfTest.jpg'))
                ->attach('file[]', base_path('tests/Browser/TestFile/TestNewsLetter.pdf'))
                ->press('Voeg artikel toe')
                ->assertPathIs('/nieuwsartikel')
                ->assertSee('Artikel opgeslagen');
        });
    }

    public function testFailCreateArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsartikel')
                ->resize(3000, 3000)
                ->clickLink("Nieuw artikel")
                ->press('Voeg artikel toe')
                ->assertPathIs('/nieuwsartikel/create')
                ->assertSee('Het titel veld is verplicht.')
                ->assertSee('Het datum veld is verplicht.')
                ->assertSee('Het beschrijving veld is verplicht.');

        });
    }

    public function testEditArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsartikel')
                ->resize(3000, 3000)
                ->clickLink("Pas nieuwsartikel aan")
                ->type('title', 'test')
                ->type('date', '552023')
                ->type('body', 'test')
                ->attach('img[]', base_path('tests/Browser/TestImage/GolfTest.jpg'))
                ->attach('file[]', base_path('tests/Browser/TestFile/TestNewsLetter.pdf'))
                ->press('Pas artikel aan')
                ->assertPathIs('/nieuwsartikel')
                ->assertSee('Artikel opgeslagen');

        });
    }

    public function testFailEditArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsartikel')
                ->clickLink("Pas nieuwsartikel aan")
                ->type('title', '')
                ->type('date', '')
                ->type('body', '')
                ->press('Pas artikel aan')
                ->assertPathIs('/nieuwsartikel/*/edit')
                ->assertSee('Het titel veld is verplicht.')
                ->assertSee('Het datum veld is verplicht.')
                ->assertSee('Het beschrijving veld is verplicht.');
        });
    }

    public function testDeleteArticle(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsartikel')
                ->resize(3000, 3000)
                ->press("Verwijder nieuwsartikel")
                ->assertPathIs('/nieuwsartikel')
                ->assertSee('Artikel verwijderd.');
        });
    }



    public function testCreateNewsletter(): void
    {
        $this->artisan('db:seed');
        $newsletter = NewsLetter::factory()->create();

        $this->browse(function (Browser $browser) use ($newsletter) {
            $browser->loginAs(User::find(1))
                ->visit('/nieuwsbrief')
                ->resize(3000, 3000)
                ->clickLink('Nieuwe nieuwsbrief')
                ->type('date', '552023')
                ->attach('file', $newsletter->pdf)
                ->press('Voeg nieuwsbrief toe')
                ->assertPathIs('/nieuwsbrief')
                ->assertSee('Nieuwsbrief opgeslagen');
        });
    }

    public function testFailCreateNewsletter(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsbrief')
                ->resize(3000, 3000)
                ->clickLink('Nieuwe nieuwsbrief')
                ->press('Voeg nieuwsbrief toe')
                ->assertPathIs('/nieuwsbrief/create')
                ->assertSee('PDF bestand is verplicht.')
                ->assertSee('Het datum veld is verplicht.');
        });
    }

    public function testEditNewsLetter(): void
    {
        $this->artisan('db:seed');
        $newsletter = NewsLetter::factory()->create();

        $this->browse(function (Browser $browser) use ($newsletter) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsbrief')
                ->resize(3000, 3000)
                ->clickLink("Pas nieuwsbrief aan")
                ->type('date', '552023')
                ->screenshot('nieuwsscreenshot')
                ->attach('file', $newsletter->pdf)
                ->press('Wijzig nieuwsbrief')
                ->assertPathIs('/nieuwsbrief')
                ->assertSee('Nieuwsbrief opgeslagen');
        });
    }

    public function testFailEditNewsLetter(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsbrief')
                ->resize(3000, 3000)
                ->clickLink("Pas nieuwsbrief aan")
                ->type('date', '')
                ->press('Wijzig nieuwsbrief')
                ->assertPathIs('/nieuwsbrief/*/edit')
                ->assertSee('Datum is geen geldige datum.');
        });
    }
    public function testDeleteNewsLetter(): void
    {
        $this->artisan('db:seed');
        $newsletter = NewsLetter::factory()->create();

        $this->browse(function (Browser $browser) use ($newsletter) {
            $browser->loginAs(User::find(1));
            $browser->visit('/nieuwsbrief')
                ->resize(3000, 3000)
                ->click('@eventNieuwsbrief'. $newsletter->id . '_verwijder')
                ->press( "Verwijder nieuwsbrief")
                ->assertPathIs('/nieuwsbrief')
                ->assertSee('Nieuwsbrief verwijderd.');

            });
    }
}

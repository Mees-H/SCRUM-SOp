<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AlbumTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function testCreateAlbum(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/galerij')
                    ->waitUntilEnabled('@create')
                    ->clickLink('Creeër nieuw album')
                    ->type('title', 'Test Titel')
                    ->type('description', 'Test Omschrijving')
                    ->type('date', '06062022')
                    ->press('Album toevoegen')
                    ->assertSee('Album is aangemaakt');
        });
    }

    public function testCreateAlbumFail(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->waitUntilEnabled('@create')
                    ->clickLink('Creeër nieuw album')
                    ->press('Album toevoegen')
                    ->assertDontSee('Album is aangemaakt.');
        });
    }

    public function testEditAlbum(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->waitUntilEnabled('@editAlbum')
                    ->clickLink('Aanpassen')
                    ->type('title', 'Test Titel')
                    ->type('description', 'Test Omschrijving')
                    ->type('date', '06062022')
                    ->press('Update')
                    ->assertSee('Album geüpdatet.');
        });
    }
    public function testEditAlbumFail(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->waitUntilEnabled('@editAlbum')
                    ->clickLink('Aanpassen')
                    ->type('title', '')
                    ->type('description', '')
                    ->type('date', '')
                    ->press('Update')
                    ->assertDontSee('Album geüpdatet.');
        });
    }

    public function testDeleteAlbum(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->waitUntilEnabled('@deleteAlbum')
                    ->press('Verwijderen')
                    ->assertSee('Album verwijderd.');
        });
    }

}

<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AlbumTest extends DuskTestCase
{
    public function testCreateAlbum(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/galerij')
                    ->clickLink('Creeër nieuw album')
                    ->type('title', 'Test Titel')
                    ->type('description', 'Test Omschrijving')
                    ->type('date', '06062023')
                    ->press('Album toevoegen')
                    ->assertSee('Album is aangemaakt');
        });
    }

    public function testCreateAlbumFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->clickLink('Creeër nieuw album')
                    ->press('Album toevoegen')
                    ->assertDontSee('Album is aangemaakt.');
        });
    }

    public function testEditAlbum(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->clickLink('Aanpassen')
                    ->type('title', 'Test Titel')
                    ->type('description', 'Test Omschrijving')
                    ->type('date', '06062023')
                    ->press('Update')
                    ->assertSee('Album geüpdatet.');
        });
    }
    public function testEditAlbumFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
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
        $this->browse(function (Browser $browser) {
            $browser->visit('/galerij')
                    ->press('Verwijderen')
                    ->assertSee('Album verwijderd.');
        });
    }

}

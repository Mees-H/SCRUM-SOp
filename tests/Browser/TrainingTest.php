<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseTruncation;

class TrainingTest extends DuskTestCase
{
    use DatabaseTruncation;
    /**
     * A Dusk test example.
     */
    public function testCreateTraining(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->visit('/trainingsessions')
                    ->clickLink("Creeër nieuwe training")
                    ->type('date', '12122023')
                    ->type('starttime', '1200P')
                    ->type('endtime', '1300')
                    ->type('body', 'dusktest')
                    ->radio('group', '2')
                    ->check('vacationweek')
                    ->press('Voeg training toe')
                    ->assertPathIs('/trainingsessions')
                    ->assertSee('Trainingsessie opgeslagen.');
        });
    }

    public function testFailCreateTraining(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->visit('/trainingsessions')
                    ->clickLink('Creeër nieuwe training')
                    ->press('Voeg training toe')
                    ->assertPathIs('/trainingsessions/create')
                    ->assertSee('Het datum veld is verplicht.')
                    ->assertSee('Het begintijd veld is verplicht.')
                    ->assertSee('Het eindtijd veld is verplicht.')
                    ->assertSee('Het beschrijving veld is verplicht.')
                    ->assertSee('Het groep veld is verplicht.');
        });
    }

    public function testEditTraining(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->visit('/trainingsessions')
                    ->clickLink('Aanpassen')
                    ->type('date', '12122023')
                    ->type('starttime', '1200P')
                    ->type('endtime', '1300')
                    ->type('body', 'dusktest')
                    ->radio('group', '2')
                    ->check('vacationweek')
                    ->press('Update')
                    ->assertPathIs('/trainingsessions')
                    ->assertSee('Trainingsessie opgeslagen.');
        });
    }

    public function testFailEditTraining(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->visit('/trainingsessions')
                    ->clickLink('Aanpassen')
                    ->type('date', '')
                    ->type('starttime', '')
                    ->type('endtime', '')
                    ->type('body', '')
                    ->press('Update')
                    ->assertPathIs('/trainingsessions/*/edit')
                    ->assertSee('Het datum veld is verplicht.')
                    ->assertSee('Het begintijd veld is verplicht.')
                    ->assertSee('Het eindtijd veld is verplicht.')
                    ->assertSee('Het beschrijving veld is verplicht.');
        });
    }

    public function testDeleteTraining(): void
    {
        $this->artisan('db:seed');
        $this->browse(function (Browser $browser) {
            $browser->visit('/trainingsessions')
                    ->press("Verwijderen")
                    ->assertPathIs("/trainingsessions")
                    ->assertSee("Trainingsessie verwijderd.");
        });
    }
}

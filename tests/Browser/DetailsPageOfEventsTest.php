<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DetailsPageOfEventsTest extends DuskTestCase
{
    /**
     * Testing the flow from the homepage to the details page of an event.
     *
     * @test void
     */
    public function VisitingDetailsPage(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Evenementen')
                    ->assertSee('Evenementen')
                    ->waitUntilEnabled('@ButtonToDetailsEvent')
                    ->click('@ButtonToDetailsEvent')
                    ->assertSee('Indoor-Golf-Middag')
                    ->assertSee('12:00')
                    ->waitUntilEnabled('@BackButton')
                    ->click('@BackButton')
                    ->assertPathIs('/evenement');
        });
    }
    public function ClickWebsiteLink(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/evenement/1/details')
                    ->waitUntilEnabled('@WebsiteLink')
                    ->click('@WebsiteLink')
                    ->assertPathIsNot('/evenement/1/details');
        });
    }
}

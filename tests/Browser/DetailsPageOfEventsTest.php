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
                    ->click('@ButtonToDetailsEvent')
                    ->assertSee('Indoor-Golf-Middag')
                    ->assertSee('Klaas Jacobs')
                    ->assertSee('12:00')
                    ->click('@BackButton')
                    ->assertPathIs('/evenement');
        });
    }
    public function ClickWebsiteLink(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/evenement/1/details')
                    ->click('@WebsiteLink')
                    ->assertPathIsNot('/evenement/1/details');
        });
    }
}

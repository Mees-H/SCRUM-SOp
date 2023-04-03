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
     * @return void
     */
    public function VisitingDetailsPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Evenementen')
                    ->assertSee('Evenementen')
                    ->click('@ButtonToDetailsEvent')
                    ->assertPathIs('/events/{id}');
        });
    }
}

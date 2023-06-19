<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SliderTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh --seed');
    }

    public function testUploadNotification(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/slider/create')
                    ->attach('image', __DIR__.'/TestImage/TestImageSpecialGolf.jpg')
                    ->press('Upload Afbeelding')
                    ->waitForText('Afbeelding is succesvol geüpload');
        });
    }

    public function testUploadFailNotification(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/slider/create')
                    ->press('Upload Afbeelding')
                    ->waitForText('Het afbeelding veld is verplicht.');
        });
    }

    public function testImageRemovalNotification(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/slider')
                    ->press('Verwijder Foto')
                    ->waitForText('Afbeelding is succesvol verwijderd');
        });
    }


}

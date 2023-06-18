<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BannerTest extends DuskTestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh --seed');
    }

    public function testUpdateBannerNoPic(): void
    {
        $this->browse(function (Browser $browser) {
            $page = Page::first();

            $browser->loginAs(User::find(1))
                    ->visit('/banners')
                    ->resize(3000,3000)
                    ->press('@' . $page->title . '_banner_aanpassen')
                    ->press('@upload')
                    ->assertSee('Je moet een afbeelding selecteren');
        });
    }

    //Test werkt niet als de naam van de banner niet overeenkomt met de naam van de banner in de seeddata
    public function testUpdateBanner(): void
    {
        $this->browse(function (Browser $browser) {
            $page = Page::first();

            $browser->loginAs(User::find(1))
                    ->visit('/banners')
                    ->resize(3000,3000)
                    ->press('@' . $page->title . '_banner_aanpassen')
                    ->attach('image', ('public/img/banners/' . $page->banner_image))
                    ->press('@upload')
                    ->assertSee('Banner is aangepast');
        });
    }
}

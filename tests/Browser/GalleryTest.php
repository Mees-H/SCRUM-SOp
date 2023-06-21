<?php

namespace Tests\Browser;;

use App\Models\Picture;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Support\Facades\DB;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Album;

class GalleryTest extends DuskTestCase
{

    /**
     * @throws \Throwable
     */
    public function testGalleryRoutes(): void
    {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            $browser
                ->visitRoute('galerij_jaar', ['year' => '2021'])
                ->assertPathIs("/albums/2021");
            $browser
                ->click('@AlbumTest')
                ->assertPathIs("/albums/1/2021");
            $browser
                ->click('@PictureTest')
                ->assertAttribute('@PictureTest', 'src', '/img/album1foto1.jpg');
        });

    }
}

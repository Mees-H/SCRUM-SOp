<?php

namespace Tests\Browser;

use App\Models\Album;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SitemapTest extends DuskTestCase
{
    public function testSitemap(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/links')
                ->clickLink("trainingen")
                ->assertPathIs("/training");
            $browser->visit('/links')
                ->clickLink("team")
                ->assertPathIs("/team");
        });
    }


    public function testAllLinks() : void
    {
        $this->browse(function (Browser $browser) {
            $links = json_decode(Storage::disk('public')->get('sitemap.json'),true);
            $links = array_filter($links['categories'], function ($category) {
                return $category['private'] !== true;
            });
            $years = Album::all()->pluck('date')->map(function ($date) {
                return (new \DateTime($date))->format('Y');
            })->unique()->toArray();

            foreach ($links as $category){
                foreach ($category['links'] as $link){
                    $browser->visit('/links')
                        ->assertSee($category['name'])
                        ->clickLink($link['name'])
                        ->assertPathIs($link['link']);
                }
            }

            foreach ($years as $year){
                $browser->visit('/links')
                    ->clickLink($year)
                    ->assertPathIs("/galerij/$year");
            }
        });
    }
}

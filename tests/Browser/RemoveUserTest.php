<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RemoveUserTest extends DuskTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            //make admin
            $admin = User::factory()->create([
                'email' => 'dusk@test.nl',
                'password' => bcrypt('Ab12345!'),
                'role' => 'admin',
            ]);

            //make user to be deleted
            $user = User::factory()->create([
                'email' => 'weeb@test.nl',
                'password' => bcrypt('Ab12345!'),
                'role' => 'supervisor',
            ]);

            //login as admin
            $browser->visit('/login')
                ->type('email', $admin->email)
                ->type('password', 'Ab12345!')
                ->press('Inloggen')
                ->visit('/admin/gebruikers')
                ->assertSee('gebruikers')
                ->assertSee($user->email)
                ->press('@'.$user->id)
                ->assertDontSee($user->email)
                ->visit('/admin/gebruikers/all')
                ->assertSee($user->email)
                ->assertDontSee('@'.$user->id);
        });
    }

}

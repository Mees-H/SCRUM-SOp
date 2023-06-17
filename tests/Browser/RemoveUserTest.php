<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RemoveUserTest extends DuskTestCase
{
    // use DatabaseTruncation;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    /**
     * A Dusk test example.
     */
    public function test_archive_user(): void
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
                ->resize(3000,3000)
                ->type('email', $admin->email)
                ->type('password', 'Ab12345!')
                ->press('Inloggen')
                ->visit('/admin/gebruikers')
                ->assertSee('gebruikers')
                ->assertSee($user->email)
                ->press('@archiveUser'.$user->id)
                ->assertDontSee($user->email)
                ->visit('/admin/gebruikers/all')
                ->assertSee($user->email)
                ->assertDontSee('@archiveUser'.$user->id)
                ->logout();
        });
    }

    public function test_unarchive_user(): void
    {
        $this->browse(function (Browser $browser) {
            $admin = User::factory()->create([
                'email' => 'dusk@test.nl',
                'password' => bcrypt('Ab12345!'),
                'role' => 'admin',
            ]);

            $user = User::factory()->create([
                'email' => 'usertest@test.nl',
                'password' => bcrypt('Ab12345!'),
                'role' => 'supervisor',
            ]);

                //login as admin
                $browser->visit('/login')
                    ->resize(3000,3000)
                    ->type('email', $admin->email)
                    ->type('password', 'Ab12345!')
                    ->press('Inloggen')
                    ->visit('/admin/gebruikers')
                    ->assertSee('gebruikers')
                    ->assertPathIs('/admin/gebruikers')
                    ->assertSee($user->email)
                    ->press('@archiveUser'.$user->id)
                    ->assertDontSee($user->email)
                    ->visit('/admin/gebruikers/all')
                    ->assertSee($user->email)
                    ->press('@dearchiveUser'.$user->id)
                    ->assertPathIs("/admin/gebruikers/all")
                    ->assertSee("Gebruiker hersteld!")
                    ->press('@viewActiveUsers')
                    ->assertSee($user->email)
                    ->logout();
        });
    }

    public function test_permanently_delete_user(): void
    {
        $this->browse(function (Browser $browser) {
            $admin = User::factory()->create([
                'email' => 'dusk@test.nl',
                'password' => bcrypt('Ab12345!'),
                'role' => 'admin',
            ]);

            $user = User::factory()->create([
                'email' => 'usertest@test.nl',
                'password' => bcrypt('Ab12345!'),
                'role' => 'supervisor',
            ]);

                //login as admin
                $browser->visit('/login')
                    ->resize(3000,3000)
                    ->type('email', $admin->email)
                    ->type('password', 'Ab12345!')
                    ->press('Inloggen')
                    ->visit('/admin/gebruikers')
                    ->assertSee('gebruikers')
                    ->assertPathIs('/admin/gebruikers')
                    ->assertSee($user->email)
                    ->press('@archiveUser'.$user->id)
                    ->assertDontSee($user->email)
                    ->visit('/admin/gebruikers/all')
                    ->assertSee($user->email)
                    ->press('@permanentlyDeleteUser'.$user->id)
                    ->assertPathIs("/admin/gebruikers/all")
                    ->assertSee("Gebruiker permanent verwijderd!")
                    ->assertDontSee($user->email)
                    ->press('@viewActiveUsers')
                    ->assertPathIs('/admin/gebruikers')
                    ->assertDontSee($user->email)
                    ->logout();
        });
    }

}

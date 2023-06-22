<?php

namespace Tests\Browser;;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Support\Facades\DB;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateUserTest extends DuskTestCase
{

    use DatabaseTruncation;

    /**
     * @throws \Throwable
     */
    public function test_create_user(): void
    {
        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {
            if (User::where('email', 'duskadmin@test.nl')->first() == null) {
                $user = new User();
                $user->name = 'Dusk';
                $user->email = 'duskadmin@test.nl';
                $user->password = bcrypt('Ab12345!');
                $user->role = 'admin';
                $user->save();
            }

            $browser->visit('/login')
                ->type('email', 'duskadmin@test.nl')
                ->type('password', 'Ab12345!')
                ->press('Inloggen')
                ->visit('/admin/accounts')
                ->waitUntilEnabled('@createUserButton')
                ->clickLink('Voeg account toe')
                ->assertSee('Account aanmaken')
                ->select('role', 'admin')
                ->type('name', 'DuskUser')
                ->type('email', 'duskuser@gmail.com')
                ->type('password', 'Ab12345!')
                ->type('password_confirmation', 'Ab12345!')
                ->press('registreerknop')
                ->assertSee('account aangemaakt')
                ->logout()
                ->visit('/login')
                ->type('email', 'duskuser@gmail.com')
                ->type('password', 'Ab12345!')
                ->press('Inloggen')
                ->click("#navbarDropdownOrganisatie")
                ->assertSee('Accounts')
                ->logout();
        });
    }
}

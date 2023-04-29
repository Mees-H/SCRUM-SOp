<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TeamTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    use DatabaseTruncation;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    #region create validation
    public function testCreateMember(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members')
                    ->assertSee('Lid opgeslagen.');
        });
    }

    public function testCreateMemberNoName(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('email', 'freek@vonk.nl')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Het naam veld is verplicht.');
        });
    }

    public function testCreateMemberNoEmail(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('name', 'Freek Vonk')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Het email veld is verplicht.');
        });
    }

    public function testCreateMemberPhonenumberIsNumber(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', 'hoihoi:3:3')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Telefoonnummer dient een nummer te zijn.');
        });
    }

    public function testCreateMemberPhonenumberMax10(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '06123456789')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Telefoonnummer moet 10 cijfers zijn.');
        });
    }

    public function testCreateMemberPhonenumberMin10(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '061234567')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Telefoonnummer moet 10 cijfers zijn.');
        });
    }

    public function testCreateMemberLongName(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('name', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                    ->type('email', 'freek@vonk.nl')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Naam mag niet groter zijn dan 255 karakters.');
        });
    }

    public function testCreateMemberLongEmail(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Voeg nieuw lid toe')
                    ->type('email', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@a.nl')
                    ->type('name', 'Freek Vonk')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Voeg lid toe')
                    ->assertPathIs('/members/create')
                    ->assertSee('Email mag niet groter zijn dan 255 karakters.');
        });
    }
    #endregion

    #region edit validation
    public function testEditMember(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members')
                    ->assertSee('Lid aangepast.');
        });
    }

    public function testEditMemberNoName(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', '')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Het naam veld is verplicht.');
        });
    }

    public function testEditMemberNoEmail(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', 'Freek Vonk')
                    ->type('email', '')
                    ->type('phonenumber', '')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Het email veld is verplicht.');
        });
    }

    public function testEditMemberPhonenumberIsNumber(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', 'hoihoi:3:3')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Telefoonnummer dient een nummer te zijn.');
        });
    }

    public function testEditMemberPhonenumberMax10(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '06123456789')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Telefoonnummer moet 10 cijfers zijn.');
        });
    }

    public function testEditMemberPhonenumberMin10(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', 'Freek Vonk')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '061234567')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Telefoonnummer moet 10 cijfers zijn.');
        });
    }

    public function testEditMemberLongName(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('name', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                    ->type('email', 'freek@vonk.nl')
                    ->type('phonenumber', '')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Naam mag niet groter zijn dan 255 karakters.');
        });
    }

    public function testEditMemberLongEmail(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->clickLink('Aanpassen')
                    ->type('email', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@aaaaaaaaaaaaaaaaaaaaa.aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@a.nl')
                    ->type('name', 'Freek Vonk')
                    ->type('phonenumber', '')
                    ->click('input[id="1"]')
                    ->scrollIntoView('button[type="submit"]')
                    ->press("Update")
                    ->assertPathIs('/members/*/edit')
                    ->assertSee('Email mag niet groter zijn dan 255 karakters.');
        });
    }
    #endregion

    public function testDeleteMember(): void
    {
        // Truncate the database
        $this->artisan('migrate:fresh --seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/members')
                    ->press('Verwijderen')
                    ->assertPathIs('/members')
                    ->assertSee('Lid verwijderd');
        });
    }
}

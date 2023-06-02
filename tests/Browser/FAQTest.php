<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FAQTest extends DuskTestCase
{
    public function testSendQuestionRoute(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/vragenantwoorden')
                    ->clickLink("Stel een vraag")
                    ->assertPathIs("/vragenantwoorden/vraagformulier");
        });
    }
    
    public function testCreateFAQ(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/faq')
                    ->clickLink("Creeër nieuwe veelgestelde vraag")
                    ->type("vraag", "Hoe kan ik het nieuws zien?")
                    ->type("antwoord", "Klik op de 'Nieuws' knop in de menubalk.")
                    ->press('Voeg veelgestelde vraag toe')
                    ->assertPathIs("/faq")
                    ->assertSee("Veelgestelde vraag opgeslagen.");
        });
    }

    public function testCreateFAQLongQuestionText(): void
    {
        $this->browse(function (Browser $browser) {

            $string = '';
            for ($i = 0; $i < 300; $i++) {
                $string .= 'a';
            }

            $browser->visit('/faq')
                    ->clickLink("Creeër nieuwe veelgestelde vraag")
                    ->type("vraag", $string)
                    ->type("antwoord", "Klik op de 'Nieuws' knop in de menubalk.")
                    ->press('Voeg veelgestelde vraag toe')
                    ->assertPathIsNot("/faq")
                    ->assertSee("Vraag mag niet groter zijn dan 255 karakters.");
        });
    }
    
    public function testCreateFAQLongAnswerText(): void
    {
        $this->browse(function (Browser $browser) {

            $string = '';
            for ($i = 0; $i < 2000; $i++) {
                $string .= 'a';
            }

            $browser->visit('/faq')
                    ->clickLink("Creeër nieuwe veelgestelde vraag")
                    ->type("vraag", "Hoe kan ik het nieuws zien?")
                    ->type("antwoord", $string)
                    ->press('Voeg veelgestelde vraag toe')
                    ->assertPathIsNot("/faq")
                    ->assertSee("Antwoord mag niet groter zijn dan 999 karakters.");
        });
    }

    public function testCreateFAQRequired(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->clickLink("Creeër nieuwe veelgestelde vraag")
                    ->press('Voeg veelgestelde vraag toe')
                    ->assertPathIsNot("/faq");
        });
    }

    public function testEditFAQ(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->clickLink("Aanpassen")
                    ->type("vraag", "Hoe kan ik het nieuws zien?")
                    ->type("antwoord", "Klik op de 'Nieuws' knop in de menubalk.")
                    ->press('Pas veelgestelde vraag aan')
                    ->assertPathIs("/faq")
                    ->assertSee("Veelgestelde vraag geupdatet.");
        });
    }

    public function testEditFAQTooLongQuestion(): void
    {
        
        $this->browse(function (Browser $browser) {

            $string = '';
            for ($i = 0; $i < 300; $i++) {
                $string .= 'a';
            }

            $browser->visit('/faq')
                    ->clickLink("Aanpassen")
                    ->type("vraag", $string)
                    ->type("antwoord", "Klik op de 'Nieuws' knop in de menubalk.")
                    ->press('Pas veelgestelde vraag aan')
                    ->assertPathIsNot("/faq")
                    ->assertSee("Vraag mag niet groter zijn dan 255 karakters.");
        });
    }

    public function testEditFAQTooLongAnswer(): void
    {
        $this->browse(function (Browser $browser) {

            $string = '';
            for ($i = 0; $i < 2000; $i++) {
                $string .= 'a';
            }

            $browser->visit('/faq')
                    ->clickLink("Aanpassen")
                    ->type("vraag", "Hoe kan ik het nieuws zien?")
                    ->type("antwoord", $string)
                    ->press('Pas veelgestelde vraag aan')
                    ->assertPathIsNot("/faq")
                    ->assertSee("Antwoord mag niet groter zijn dan 999 karakters.");
        });
    }

    public function testEditFAQRequired(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->clickLink("Aanpassen")
                    ->type("vraag", "")
                    ->type("antwoord", "")
                    ->press('Pas veelgestelde vraag aan')
                    ->assertPathIsNot("/faq");
        });
    }

    public function testDeleteFAQ(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->press("Verwijderen")
                    ->assertPathIs("/faq")
                    ->assertSee("Veelgestelde vraag verwijderd.");
        });
    }

    public function testCreateFAQBackButton(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->clickLink("Creeër nieuwe veelgestelde vraag")
                    ->clickLink("Ga terug")
                    ->assertPathIs("/faq");
        });
    }

    public function testEditFAQBackButton(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/faq')
                    ->clickLink("Aanpassen")
                    ->clickLink("Ga terug")
                    ->assertPathIs("/faq");
        });
    }
}

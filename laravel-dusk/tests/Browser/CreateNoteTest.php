<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group create-note
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Enterprise Application Development')
            ->clickLink('Log in')
            ->assertPathIs('/login')
            ->type('email', 'test@mail.com')
            ->type('password', '123')
            ->press('LOG IN')
            ->assertPathIs('/dashboard')
            ->clickLink('Notes')
            ->assertPathIs('/notes')
            ->clickLink('Create Note')
            ->assertPathIs('/create-note')
            ->type('title', 'Assalamualaikum')
            ->type('description', 'Waalaikumsalam warahmatullah')
            ->press("CREATE")
            ->assertPathIs('/notes');
        });
    }
}

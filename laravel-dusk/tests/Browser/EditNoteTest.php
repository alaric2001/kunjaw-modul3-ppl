<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test Edit Note.
     * @group edit-note
     */
    public function testEditNote(): void
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
                    ->click('@edit-2') // @edit-(id disesuaikan dengan data note yang ingin diubah) 
                    ->assertPathIs('/edit-note-page/2') // /edit-note-page/(id disesuaikan dengan data note yang ingin diubah) 
                    ->type('title', 'Assalamualaikum (edit)')
                    ->type('description', 'Waalaikumsalam warahmatullah (edit test)')
                    ->press("UPDATE")
                    ->assertPathIs('/notes');
        });
    }
}

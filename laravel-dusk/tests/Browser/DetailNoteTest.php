<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DetailNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group detail-note
     */
    public function testDetailNote(): void
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
                    ->click('@detail-2') // @detail-(sesuaikan dengan id note yang ingin diubah) 
                    ->assertPathIs('/note/2'); // /note/(sesuaikan dengan id note yang ingin diubah)


        });
    }
}

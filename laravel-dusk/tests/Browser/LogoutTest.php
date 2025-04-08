<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
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

                    // Klik dropdown untuk menampilkan menu logout
                    ->waitFor('#click-dropdown', 5)
                    ->click('#click-dropdown')
                    ->pause(500) // Tunggu animasi dropdown
                    
                    // Klik link logout
                    ->waitFor('form[action="http://127.0.0.1:8000/logout"] a', 5)
                    ->click('form[action="http://127.0.0.1:8000/logout"] a')
                    
                    ->assertPathIs('/');
        });
    }
}

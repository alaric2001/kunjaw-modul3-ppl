<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistTest extends DuskTestCase
{
    /**
     * A Dusk test Registrasi.
     * @group regis
     */
    public function testRegistration(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Enterprise Application Development')
                ->clickLink('Register')
                ->assertPathIs('/register')
                ->type('name', 'Alaric')
                ->type('email', 'al@mail.com')
                ->type('password', '123')
                ->type('password_confirmation', '123')
                ->press('REGISTER')
                ->pause(2000) // Tunggu redirect
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

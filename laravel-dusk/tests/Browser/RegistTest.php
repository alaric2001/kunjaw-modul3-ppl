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
                ->assertPathIs('/dashboard');
        });
    }
}

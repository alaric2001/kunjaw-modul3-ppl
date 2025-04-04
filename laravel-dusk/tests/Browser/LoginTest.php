<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test Login.
     * @group login
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise Application Development')
                    ->clickLink('Log in')
                    ->assertPathIs('/login')
                    ->type('email', 'test@mail.com')
                    ->type('password', '123')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard');
        });
    }
}

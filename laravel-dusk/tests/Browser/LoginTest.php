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
            $browser->visit('/') // Mengarahkan browser otomatis untuk mengunjungi halaman beranda ('/')
                ->assertSee('Enterprise Application Development') // Memastikan teks "Enterprise Application Development" muncul di halaman
                ->clickLink('Log in') // Mengklik tautan dengan teks "Log in"
                ->assertPathIs('/login') // Memastikan URL berubah menjadi '/login' setelah klik
                ->type('email', 'test@mail.com') // Mengisi field email dengan 'test@mail.com'
                ->type('password', '123') // Mengisi field password dengan '123'
                ->press('LOG IN') // Menekan tombol 'LOG IN' untuk submit form login
                ->assertPathIs('/dashboard'); // Memastikan setelah login, diarahkan ke halaman '/dashboard'
        });
    }
}

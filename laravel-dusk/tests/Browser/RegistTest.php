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
            $browser->visit('/') // Mengarahkan browser otomatis ke halaman beranda ('/')
                ->assertSee('Enterprise Application Development') // Memastikan teks "Enterprise Application Development" muncul di halaman
                ->clickLink('Register') // Mengklik tautan dengan teks "Register"
                ->assertPathIs('/register') // Memastikan URL berubah ke '/register'
                ->type('name', 'aniko') // Mengisi field 'name' dengan 'Egi'
                ->type('email', 'aniko@mail.com') // Mengisi field 'email' dengan 'egi@mail.com'
                ->type('password', '123') // Mengisi field 'password' dengan '123'
                ->type('password_confirmation', '123') // Mengisi konfirmasi password dengan '123'
                ->press('REGISTER') // Menekan tombol 'REGISTER' untuk submit form registrasi
                ->pause(2000) // Menunggu selama 2 detik agar proses redirect selesai
                ->assertPathIs('/dashboard'); // Memastikan pengguna diarahkan ke halaman '/dashboard' setelah registrasi berhasil
        });
    }
}

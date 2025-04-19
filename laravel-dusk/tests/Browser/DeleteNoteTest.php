<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group delete-note
     */
    public function testDeleteNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman awal aplikasi (home page)
                    ->assertSee('Enterprise Application Development') // Memastikan teks "Enterprise Application Development" terlihat di halaman
                    ->clickLink('Log in') // Mengklik tautan "Log in"
                    ->assertPathIs('/login') // Memastikan halaman berpindah ke '/login'
                    ->type('email', 'test@mail.com') // Mengisi field email dengan 'test@mail.com'
                    ->type('password', '123') // Mengisi field password dengan '123'
                    ->press('LOG IN') // Menekan tombol 'LOG IN' untuk masuk
                    ->assertPathIs('/dashboard') // Memastikan setelah login diarahkan ke halaman '/dashboard'
                    ->clickLink('Notes') // Mengklik menu atau link 'Notes'
                    ->assertPathIs('/notes') // Memastikan berada di halaman '/notes'
                    ->press('#delete-30') // #delete-(sesuaikan dengan id note yang ingin dihapus)
                    ->assertPathIs('/notes'); // Kembali memastikan halaman saat ini tetap '/notes'
        });
    }
}

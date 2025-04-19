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
            $browser->visit('/') // Mengunjungi halaman utama aplikasi
                    ->assertSee('Enterprise Application Development') // Memastikan teks "Enterprise Application Development" terlihat
                    ->clickLink('Log in') // Klik tautan "Log in"
                    ->assertPathIs('/login') // Memastikan bahwa halaman saat ini adalah '/login'
                    ->type('email', 'test@mail.com') // Mengisi kolom email dengan 'test@mail.com'
                    ->type('password', '123') // Mengisi kolom password dengan '123'
                    ->press('LOG IN') // Menekan tombol 'LOG IN'
                    ->assertPathIs('/dashboard') // Memastikan pengguna diarahkan ke '/dashboard'
                    ->clickLink('Notes') // Mengklik link 'Notes'
                    ->assertPathIs('/notes') // Memastikan halaman saat ini adalah '/notes'
                    ->click('@edit-30') // @edit-(id disesuaikan dengan data note yang ingin diubah) 
                    ->assertPathIs('/edit-note-page/30') // /edit-note-page/(id disesuaikan dengan data note yang ingin diubah) 
                    ->type('title', 'PPL Modul 3') // Mengisi kolom 'title' dengan teks yang telah diperbarui
                    ->type('description', 'Praktikum PPL Modul 3') // Mengisi kolom 'description' dengan teks baru
                    ->press("UPDATE") // Menekan tombol "UPDATE" untuk menyimpan perubahan catatan
                    ->assertPathIs('/notes'); // Memastikan tetap berada di halaman '/notes' setelah update berhasil
        });
    }
}

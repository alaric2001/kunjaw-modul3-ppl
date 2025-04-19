<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    /**
     * A Dusk test Create.
     * @group create-note
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Mengunjungi halaman utama (sebelum login)
                ->assertSee('Enterprise Application Development') // Memastikan teks tersebut tampil di halaman
                ->clickLink('Log in') // Mengklik link "Log in"
                ->assertPathIs('/login') // Memastikan URL sekarang adalah '/login'
                ->type('email', 'test@mail.com') // Mengisi input email dengan 'test@mail.com'
                ->type('password', '123') // Mengisi input password dengan '123'
                ->press('LOG IN') // Menekan tombol 'LOG IN'
                ->assertPathIs('/dashboard') // Memastikan redirect ke halaman '/dashboard'
                ->clickLink('Notes') // Mengklik link "Notes"
                ->assertPathIs('/notes') // Memastikan berada di halaman '/notes'
                ->clickLink('Create Note') // Mengklik link "Create Note"
                ->assertPathIs('/create-note') // Memastikan berada di halaman '/create-note'
                ->type('title', 'Assalamualaikumm') // Mengisi input 'title' dengan teks
                ->type('description', 'Waalaikumsalam warahmatullah') // Mengisi input 'description' dengan teks
                ->press("CREATE") // Menekan tombol "CREATE" untuk menyimpan catatan
                ->assertPathIs('/notes'); // Memastikan kembali ke halaman '/notes' setelah berhasil membuat catatan
        });
    }
}

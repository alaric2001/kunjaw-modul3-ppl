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
            $browser->visit('/') // Mengunjungi halaman utama (homepage)
                    ->assertSee('Enterprise Application Development') // Memastikan teks "Enterprise Application Development" muncul di halaman
                    ->clickLink('Log in') // Mengklik link "Log in"
                    ->assertPathIs('/login') // Memastikan bahwa path URL saat ini adalah '/login'
                    ->type('email', 'test@mail.com') // Mengisi field email dengan 'test@mail.com'
                    ->type('password', '123') // Mengisi field password dengan '123'
                    ->press('LOG IN') // Menekan tombol "LOG IN"
                    ->assertPathIs('/dashboard') // Memastikan redirect berhasil ke halaman '/dashboard'
                    ->clickLink('Notes') // Mengklik link "Notes"
                    ->assertPathIs('/notes') // Memastikan berada di halaman '/notes'
                    ->click('@detail-28')//@detail-(sesuaikan dengan id note yang ingin diubah) 
                    ->assertPathIs('/note/28'); //(sesuaikan dengan id note yang ingin diubah)
        });
    }
}

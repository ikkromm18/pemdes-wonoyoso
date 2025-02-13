<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLoginUserDanCekProfileRiwayat(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Login')
                ->visit('/login')
                ->type('email', 'user@example.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/')
                ->clickLink('User')
                ->assertPathIs('/profile')
                ->assertSee('Informasi Pribadi')
                ->clickLink('Riwayat Pengajuan')
                ->assertSee('Riwayat Pengajuan')
                ->clickLink('Home')
                ->assertSee('Log Out')
                ->press('Log Out')
                ->assertSee('Apakah Anda Yakin Ingin Melakukan Log Out ?')
                ->clickLink('Log Out');
        });
    }
}

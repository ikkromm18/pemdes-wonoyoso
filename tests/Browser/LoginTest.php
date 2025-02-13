<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAdminLoginDanLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Login')
                ->visit('/login')
                ->type('email', 'admin@example.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/')
                ->clickLink('Dashboard')
                ->assertPathIs('/dashboard')
                ->press('Log Out')
                ->assertSee('Apakah Anda Yakin Ingin Melakukan Log Out ?')
                ->clickLink('Log Out');
        });
    }
}

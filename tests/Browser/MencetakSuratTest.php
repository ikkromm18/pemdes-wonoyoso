<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MencetakSuratTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
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
                ->visit('/pengajuandisetujui')
                ->press('@print')
                ->visit('/pengajuandisetujui');
        });
    }
}

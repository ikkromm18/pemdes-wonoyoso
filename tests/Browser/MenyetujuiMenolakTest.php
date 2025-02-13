<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenyetujuiMenolakTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testMelihatDetailMenyetujuiDanMenolak(): void
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
                ->visit('/pengajuandiproses')
                ->assertSee('Pengajuan Perlu Diproses')
                ->clickLink('Detail')
                ->assertSee('Detail Data Pengajuan')
                ->press('Setuju')
                ->assertSee('Keterangan Tambahan')
                ->press('@setuju-button');
        });
    }
}

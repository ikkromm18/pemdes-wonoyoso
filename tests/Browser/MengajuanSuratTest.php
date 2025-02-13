<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengajuanSuratTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testMengajukanSurat(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'user@example.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/')
                ->clickLink('Ajukan Sekarang')
                ->assertPathIs('/layanan')
                ->select('jenis_surat_id', '1')
                ->pause(1000)
                ->type('fields[1]', 'Fadhil Aksa')
                ->type('fields[2]', 'Laki-laki')
                ->type('fields[3]', 'Pekalongan')
                ->type('fields[4]', '2000-01-15')
                ->type('fields[5]', 'Jalan Lhiend Wonoyoso Raya Gg.7')
                ->type('fields[6]', 'Senin')
                ->type('fields[7]', '2024-02-01')
                ->type('fields[8]', 'Rumah Sakit Pekalongan')
                ->type('fields[9]', 'Sakit')

                ->scrollIntoView('@submit-pengajuan')
                ->waitFor('@submit-pengajuan')
                ->press('@submit-pengajuan')

                ->assertSee('Apakah Data Yang Anda Isi Sudah Benar?')
                ->press('@submit-btn');
        });
    }
}

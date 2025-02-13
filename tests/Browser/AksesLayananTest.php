<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AksesLayananTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testHarusLoginUntukMengaksesLayanan(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Ajukan Sekarang')
                ->clickLink('Ajukan Sekarang')
                ->assertPathIs('/login')
                ->type('email', 'user@example.com')
                ->type('password', 'password')
                ->assertSee('LOG IN')
                ->press('LOG IN')
                ->assertPathIs('/')
                ->clickLink('Ajukan Sekarang')
                ->assertPathIs('/layanan');
        });
    }
}

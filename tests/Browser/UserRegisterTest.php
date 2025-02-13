<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserRegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUserRegistrasi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Login')
                ->clickLink('Login')
                ->assertPathIs('/login')
                ->assertSee('Sign Up')
                ->clickLink('Sign Up')
                ->assertPathIs('/register')
                ->type('name', 'Fadhil Aksa')
                ->type('email', 'fadhil@gmail.com')
                ->type('password', 'password')
                ->type('password', 'password_confirmation')
                ->type('nik', '33261801040009')
                ->type('alamat', 'Jalan Lhiend Wonoyoso Raya Gg.7')
                ->attach('foto_ktp', storage_path('app/public/test-files/ktp.jpg'))
                ->attach('foto_kk', storage_path('app/public/test-files/kk.jpg'))
                ->resize(1920, 1080)
                ->scrollIntoView('@register-button')
                ->waitFor('@register-button')
                ->click('@register-button');
        });
    }
}

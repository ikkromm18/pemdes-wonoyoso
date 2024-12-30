<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserHarusLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testPenggunaHarusLoginSebelumMengajukanSurat()
    {

        $response = $this->get(route('layanan'));
        $response->assertRedirect(route('login'));
    }
}

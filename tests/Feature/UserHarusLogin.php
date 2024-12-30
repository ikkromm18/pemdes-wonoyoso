<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserHarusLogin extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testPenggunaHarusLoginSebelumMengajukanSurat()
    {

        $response = $this->get(route('layanan'));
        $response->assertRedirect(route('login'));
    }
}

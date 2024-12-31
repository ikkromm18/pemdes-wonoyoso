<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class PengajuanSuratTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Setup any necessary data here
    }

    /**
     * A basic test example.
     */
    public function testMenampilakanHalamanLayanan(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Test route
        $response = $this->get(route('layanan'));

        // Assert the response status is 200 (OK)
        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     */
    public function testUserHarusLoginSebelumMengaksesLayanan(): void
    {
        // Mencoba mengakses halaman layanan tanpa login
        $response = $this->get(route('layanan'));

        // Memastikan status respons adalah 302 (Redirect)
        $response->assertStatus(302);

        // Memastikan pengguna diarahkan ke halaman login
        $response->assertRedirect(route('login'));
    }
    /**
     * A basic test example.
     */
    public function testUserMengaksesHalamanProfile(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('profile.edit'));

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     */
    public function testUserDapatMelengkapiDataProfil()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();

        $this->actingAs($user);

        // Data yang akan diperbarui
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'alamat' => '123 Main St',
            'nik' => '1234567890123456',
            'foto_ktp' => UploadedFile::fake()->image('ktp.jpg'),
            'foto_kk' => UploadedFile::fake()->image('kk.jpg'),
        ];

        // Menguji pengiriman data untuk memperbarui profil
        $response = $this->patch(route('profile.update'), $data);

        // Memastikan pengguna diarahkan kembali ke halaman edit profil
        $response = $this->get(route('profile.edit'));

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function testUserDapatMengajukanSurat()
    {
        $user = User::factory()->create([
            'nik' => '1234567890123456',
            'alamat' => 'Test Address',
        ]);

        $this->actingAs($user);

        $data = [
            'jenis_surat_id' => 1,
            'fields' => [
                1 => 'Test Value',
                2 => 'Another Value',
            ],
        ];

        $response = $this->post(route('pengajuan.store'), $data);

        $response = $this->get(route('layanan'));

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function testAdminDapatMengaksesDataPengajuanSurat()
    {
        $user = User::factory()->create([
            'role' => 'Admin', // Mengatur role_id ke admin
        ]);

        $this->actingAs($user);

        $response = $this->get(route('pengajuansurat'));

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     */
    public function testAdminDapatMelihatDetailDataPengajuan()
    {
        $admin = User::factory()->create([
            'role' => 'Admin', // Mengatur role_id ke admin
        ]);
        $this->actingAs($admin);

        $user = User::factory()->create(); // Buat pengguna
        $pengajuan = PengajuanSurat::factory()->create(['nik' => $user->nik]); // Buat pengajuan dengan user_id


        $response = $this->get(route('pengajuan.show', $pengajuan->id));

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $pengajuan->id,
            'nik' => $pengajuan->nik,
            'nama' => $pengajuan->nama,
            'email' => $pengajuan->email,
            'alamat' => $pengajuan->alamat,
            'status' => $pengajuan->status,
        ]);



        $response = $this->get(route('pengajuansurat'));

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function testAdminDapatMenyetujuiPengajuanAdministrasi()
    {

        $admin = User::factory()->create([
            'role' => 'Admin',
        ]);
        $this->actingAs($admin);

        $pengajuan = PengajuanSurat::factory()->create(['status' => 'pending']);

        $response = $this->post(route('setuju', $pengajuan->id));

        $response = $this->get(route('pengajuansurat'));

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function testAdminDapatMenolakPengajuanAdministrasi()
    {

        $admin = User::factory()->create([
            'role' => 'Admin',
        ]);
        $this->actingAs($admin);

        $pengajuan = PengajuanSurat::factory()->create(['status' => 'pending']);

        $response = $this->post(route('menolak', $pengajuan->id));

        $response = $this->get(route('pengajuansurat'));

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     */
    public function testAdminDapatMencetakSurat()
    {
        // Membuat role admin jika diperlukan
        $admin = User::factory()->create([
            'role' => 'Admin', // Pastikan ini sesuai dengan cara Anda menyimpan role
        ]);
        $this->actingAs($admin);

        // Membuat jenis surat
        $jenisSurat = JenisSurat::factory()->create();

        $user = User::factory()->create(['role' => 'User',]); // Buat pengguna
        $pengajuan = PengajuanSurat::factory()->create(['nik' => $user->nik, 'jenis_surat_id' => $jenisSurat->id]); // Buat pengajuan dengan user_id



        // Membuat pengajuan surat
        $pengajuan = PengajuanSurat::factory()->create([
            'nik' => $user->nik,
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'alamat' => '123 Main St',
            'jenis_surat_id' => $jenisSurat->id,
            'status' => 'approved',
        ]);

        // Memanggil fungsi Print
        $response = $this->get(route('print', $pengajuan->id));

        // Memastikan status respons adalah 200
        $response->assertStatus(200);

        // Memastikan tampilan yang benar dikembalikan
        $response->assertViewIs('pdf.suratkematian'); // Ganti dengan jenis surat yang sesuai
    }
}

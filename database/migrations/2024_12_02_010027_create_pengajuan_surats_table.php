<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_surats_id')->constrained('jenis_surats')->onDelete('cascade');
            $table->foreignId('pemohon_id')->nullable()->constrained('users')->onDelete('set null'); // Opsional jika ada tabel users
            $table->enum('status', ['baru', 'diproses', 'selesai'])->default('baru'); // Status pengajuan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};

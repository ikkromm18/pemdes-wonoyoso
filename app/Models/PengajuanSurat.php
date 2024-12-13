<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surats';
    protected $fillable = [
        'nik',
        'nama',
        'email',
        'alamat',
        'jenis_surat_id',
        'status'
    ];


    public function JenisSurats()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function DataPengajuans()
    {
        return $this->hasMany(DataPengajuan::class, 'pengajuan_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'email', 'email'); // Relasi opsional
    // }
}

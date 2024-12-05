<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surats';
    protected $fillable = [
        'nama_jenis',
        'deskripsi'
    ];

    public function fieldSurats()
    {

        return $this->hasMany(FieldSurat::class, 'jenis_surat_id');
    }


    public function PengajuanSurats()
    {

        return $this->hasMany(PengajuanSurat::class, 'jenis_surat_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldSurat extends Model
{
    use HasFactory;


    protected $table = 'field_surats';

    protected $fillable = [
        'jenis_surat_id',
        'nama_field',
        'tipe_field',
        'is_required'
    ];

    public function JenisSurats()
    {

        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function PengajuanSurats()
    {
        return $this->belongsTo(PengajuanSurat::class, 'field_id');
    }
}

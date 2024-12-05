<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengajuan extends Model
{
    use HasFactory;

    protected $table = 'data_pengajuans';
    protected $fillable = [
        'pengajuan_id',
        'field_id',
        'nilai',
    ];

    public function PengajuanSurats()
    {
        return $this->belongsTo(PengajuanSurat::class, 'pengajuan_id');
    }

    public function FieldSurats()
    {
        return $this->belongsTo(FieldSurat::class, 'field_id');
    }
}

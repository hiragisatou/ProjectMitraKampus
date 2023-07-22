<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanMitra extends Model
{
    use HasFactory;
    protected $table = 'pengajuanKemitraan';
    protected $guarded = ['id'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function verifyPengajuan()
    {
        return $this->hasOne(VerifyPengajuan::class, 'pengajuanKemitraan_id');
    }
}

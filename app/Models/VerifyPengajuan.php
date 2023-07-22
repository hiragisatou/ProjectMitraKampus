<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyPengajuan extends Model
{
    use HasFactory;
    protected $table = 'verifikasiPengajuan';
    protected $guarded = ['id'];

    public function pengajuanMitra()
    {
        return $this->belongsTo(PengajuanMitra::class, 'pengajuanKemitraan_id');
    }

    public function user() {
        return $this->belongsTo(User::all(), 'admin_id');
    }
}

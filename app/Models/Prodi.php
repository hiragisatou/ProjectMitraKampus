<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $guarded = ['id'];

    public function pengajuanMitra()
    {
        return $this->hasMany(PengajuanMitra::class, 'prodi_id');
    }
}

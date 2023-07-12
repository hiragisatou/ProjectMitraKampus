<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SifatMitra extends Model
{
    use HasFactory;
    protected $table = 'sifat_mitra';
    protected $fillable = ['kategori'];


    public function mitra()
    {
        return $this->hasMany(Mitra::class, 'sifat_id');
    }
}

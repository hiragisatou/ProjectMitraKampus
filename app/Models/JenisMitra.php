<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMitra extends Model
{
    use HasFactory;
    protected $table = 'jenis_mitra';
    protected $fillable = ['jenis'];

    public function mitra()
    {
        return $this->hasMany(Mitra::class, 'jenis_id');
    }
}

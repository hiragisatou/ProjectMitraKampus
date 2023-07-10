<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria_mitra';
    protected $fillable = ['kriteria'];


    public function mitra(): HasMany
    {
        return $this->hasMany(Mitra::class, 'kriteriaMitra_id');
    }
}

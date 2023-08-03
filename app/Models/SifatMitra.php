<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SifatMitra extends Model
{
    use HasFactory;
    protected $table = 'sifat_mitra';
    protected $guarded = ['id'];

    public function mitra(): HasMany
    {
        return $this->hasMany(Mitra::class, 'sifat_mitra_id');
    }
}

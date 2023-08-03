<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $guarded = ['id'];

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'jurusan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jurusan';
    protected $guarded = ['id'];

    public function moa(): HasMany
    {
        return $this->hasMany(Moa::class, 'jurusan_id');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'jurusan_id');
    }
}

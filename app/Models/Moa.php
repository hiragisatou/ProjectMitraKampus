<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Moa extends Model
{
    use HasFactory;
    protected $table = 'moa';
    protected $guarded = ['id'];

    public function kategori(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_moa', 'moa_id', 'kategori_id');
    }

    public function prodi(): BelongsToMany
    {
        return $this->belongsToMany(Prodi::class, 'moa_to_prodi', 'moa_id', 'prodi_id');
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function verifyMoa(): HasOne
    {
        return $this->hasOne(VerifyMoa::class, 'moa_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $guarded = ['id'];

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function sifat(): BelongsTo
    {
        return $this->belongsTo(Sifat::class, 'sifat_id');
    }

    public function sektor(): BelongsTo
    {
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

    public function mou(): HasMany
    {
        return $this->hasMany(Mou::class, 'mitra_id');
    }

    public function role(): MorphOne
    {
        return $this->morphOne(Role::class, 'roleable');
    }
}

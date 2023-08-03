<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    protected $guarded = ['id'];

    protected $with = ['provinsi'];

    public function kecamatan(): HasMany
    {
        return $this->hasMany(Kecamatan::class, 'kabupaten_id');
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $guarded = ['id'];

    public function jenisMitra(): BelongsTo
    {
        return $this->belongsTo(JenisMitra::class, 'jenis_mitra_id');
    }

    public function sifatMitra(): BelongsTo
    {
        return $this->belongsTo(SifatMitra::class, 'sifat_mitra_id');
    }

    public function kriteriaMitra(): BelongsTo
    {
        return $this->belongsTo(KriteriaMitra::class, 'kriteria_mitra_id');
    }

    public function sektorIndustri(): BelongsTo
    {
        return $this->belongsTo(SektorIndustri::class, 'sektor_industri_id');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function pengajuanMoU(): HasMany
    {
        return $this->hasMany(PengajuanMoU::class, 'mitra_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

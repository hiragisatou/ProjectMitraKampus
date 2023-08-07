<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanMoU extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pengajuan_mou';
    protected $guarded = ['id'];

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'prodi_id')->withTrashed();
    }

    public function verifymou(): HasOne
    {
        return $this->hasOne(VerifyMoU::class, 'pengajuan_mou_id');
    }
}

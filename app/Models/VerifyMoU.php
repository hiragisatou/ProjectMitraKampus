<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VerifyMoU extends Model
{
    use HasFactory;
    protected $table = 'verify_mou';
    protected $guarded = ['id'];

    public function pengajuanmou(): BelongsTo
    {
        return $this->belongsTo(PengajuanMoU::class, 'pengajuan_mou_id')->withTrashed();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $guarded = ['id'];

    public function pengajuanMoU(): HasMany
    {
        return $this->hasMany(PengajuanMoU::class, 'prodi_id');
    }

    public function kriteriaMitra(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}

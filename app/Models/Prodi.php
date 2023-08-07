<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'prodi';
    protected $guarded = ['id'];

    public function PengajuanMoU(): HasMany
    {
        return $this->hasMany(PengajuanMoU::class, 'prodi_id');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id')->withTrashed();
    }


}

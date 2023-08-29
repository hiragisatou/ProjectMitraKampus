<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mou extends Model
{
    use HasFactory;
    protected $table = 'mou';
    protected $guarded = ['id'];

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function verifyMou(): HasOne
    {
        return $this->hasOne(VerifyMou::class, 'mou_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaMitra extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kriteria_mitra';
    protected $guarded = ['id'];

    public function mitra(): HasMany
    {
        return $this->hasMany(Mitra::class, 'kriteria_mitra_id');
    }
}

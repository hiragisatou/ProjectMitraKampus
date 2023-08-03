<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SektorIndustri extends Model
{
    use HasFactory;
    protected $table = 'sektor_industri';
    protected $guarded = ['id'];

    public function mitra(): HasMany
    {
        return $this->hasMany(Mitra::class, 'sektor_industri_id');
    }
}

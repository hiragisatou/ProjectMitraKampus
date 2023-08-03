<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    protected $guarded = ['id'];

    public function kabupaten(): HasMany
    {
        return $this->hasMany(Kabupaten::class, 'provinsi_id');
    }
}

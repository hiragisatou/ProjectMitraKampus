<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kabupaten_id');
    }

    public function provinsi()
    {
        return $this->hasMany(Provinsi::class, 'provinsi_id');
    }
}

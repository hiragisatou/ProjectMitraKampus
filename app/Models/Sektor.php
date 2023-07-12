<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    use HasFactory;
    protected $table = 'sektor_industri';
    protected $fillable = ['sektor'];


    public function mitra()
    {
        return $this->hasMany(Mitra::class, 'sektorIndustri_id');
    }
}

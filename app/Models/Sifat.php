<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sifat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sifat_mitra';
    protected $guarded = ['id'];
}

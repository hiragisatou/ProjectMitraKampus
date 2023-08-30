<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sektor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sektor_industri';
    protected $guarded = ['id'];
}

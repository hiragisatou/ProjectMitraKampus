<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyMou extends Model
{
    use HasFactory;
    protected $table = 'verify_mou';
    protected $guarded = ['id'];
}

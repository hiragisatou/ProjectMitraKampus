<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $guarded = ['id'];

    public function roleable(): MorphTo
    {
        return $this->morphTo();
    }
}

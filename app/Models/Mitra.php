<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';

    public function jenisMitra(): belongsTo
    {
        return $this->belongsTo(jenisMtra::class, 'jenis_id');
    }
    public function sifatMitra(): belongsTo
    {
        return $this->belongsTo(SifatMitra::class, 'sifat_id');
    }
    public function sektor(): belongsTo
    {
        return $this->belongsTo(Sektor::class, 'sektorIndustri_id');
    }
    public function kriteria(): belongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteriaMitra_id');
    }
}

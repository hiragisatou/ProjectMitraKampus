<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
	use HasFactory;
	protected $table = 'mitra';
	protected $guarded = ['id'];

	public function jenisMitra()
	{
		return $this->belongsTo(jenisMtra::class, 'jenis_id');

	}
	public function sifatMitra()
	{
		return $this->belongsTo(SifatMitra::class, 'sifat_id');
	}
	public function sektor()
	{
		return $this->belongsTo(Sektor::class, 'sektorIndustri_id');
	}
	public function kriteria()
	{
		return $this->belongsTo(Kriteria::class, 'kriteriaMitra_id');
	}
	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

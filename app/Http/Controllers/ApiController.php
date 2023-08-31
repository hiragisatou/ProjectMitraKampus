<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Prodi;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function checkEmail(Request $request) {
        if (count(User::where('email', $request->email)->get()) == 0) {
            return 'true';
        }
        else {
            return 'false';
        }
    }
}

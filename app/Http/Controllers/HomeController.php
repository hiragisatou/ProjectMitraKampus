<?php

namespace App\Http\Controllers;

use App\Models\JenisMitra;
use App\Models\KriteriaMitra;
use App\Models\Provinsi;
use App\Models\SektorIndustri;
use App\Models\SifatMitra;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home Page
    public function index() {
        return view('pages.index');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard() {
        return view('admin.pages.dashboard');
    }
    public function viewPengajuan(){
        return view('admin.pages.pengajuan');
    }
}

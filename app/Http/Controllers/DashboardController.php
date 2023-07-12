<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Sektor;
use App\Models\Kriteria;
use App\Models\JenisMitra;
use App\Models\SifatMitra;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function viewPengajuan()
    {
        return view('admin.pages.pengajuan');
    }

    public function viewEditProfile()
    {
        return view('admin.pages.profile', [
            'mitra' => auth()->user()->mitra->toArray(),
            'sektor' => Sektor::all()->toArray(),
            'jenis' => JenisMitra::all()->toArray(),
            'kriteria' => Kriteria::all()->toArray(),
            'sifat' => SifatMitra::all()->toArray()
        ]);
    }

    public function editProfile(Request $request)
    {
        Mitra::updateOrCreate(['user_id' => auth()->user()->id], [
            'nama' => $request->nama,
            'kriteriaMitra_id' => $request->kriteria,
            'nomorIndukBerusaha' => $request->nib,
            'sektorIndustri_id' => $request->sektor,
            'sifat_id' => $request->sifat,
            'jenis_id' => $request->jenis,
            'user_id' => auth()->user()->id,
            'klasifikasi' => $request->klasifikasi,
            'jumlahPegawai' => $request['jumlah_pegawai'],
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'urlWeb' => $request->url,
            'email' => $request->email,
            'noTelp' => $request->notelp,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'tiktok' => $request->tiktok,
            'youtube' => $request->youtube,
        ]);

        return redirect(route('dashboard'))->with('success', 'Data profil berhasil diubah!');
    }
}

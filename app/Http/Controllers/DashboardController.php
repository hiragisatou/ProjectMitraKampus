<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Sektor;
use App\Models\Kriteria;
use App\Models\JenisMitra;
use App\Models\PengajuanMitra;
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

    public function pengajuanMoU(Request $request) {
        $data = $request->validate([
            'mou' => ['file', 'max:2560', 'required'],
            'judul' => ['required'],
            'jenis' => ['required'],
            'lingkup' => ['required'],
            'p_studi' => ['required'],
            'tgl_mulai' => ['required'],
            'keterangan' => ['required']
        ]);
        $data['mou'] = $request->file('mou')->storeAs('pengajuanMoU', auth()->user()->mitra->id . '_MOU_' . $data['judul'] . '_' . auth()->user()->mitra->nama . '.pdf');

        PengajuanMitra::create([
            'judul' => $data['judul'],
            'mitra_id' => auth()->user()->mitra->id,
            'jenisKemitraan' => $data['jenis'],
            'ruangLingkup' => collect($data['lingkup'])->implode('-'),
            'tgl_mulai' => $data['tgl_mulai'],
            'prodi_id' => 1,
            'keterangan' => $data['keterangan'],
            'file_mou' => $data['mou']
        ]);
    }
}

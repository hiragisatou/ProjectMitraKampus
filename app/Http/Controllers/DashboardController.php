<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Sektor;
use App\Models\Kriteria;
use App\Models\JenisMitra;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\SifatMitra;
use Illuminate\Http\Request;
use App\Models\PengajuanMitra;
use App\Models\Prodi;
use App\Models\Provinsi;
use App\Models\VerifyPengajuan;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function viewPengajuan()
    {
        return view('admin.pages.pengajuan', ['prodi' => Prodi::all()->toArray()]);
    }

    public function viewEditProfile()
    {
        return view('admin.pages.profile', [
            'mitra' => auth()->user()->mitra->toArray(),
            'sektor' => Sektor::all()->toArray(),
            'jenis' => JenisMitra::all()->toArray(),
            'kriteria' => Kriteria::all()->toArray(),
            'sifat' => SifatMitra::all()->toArray(),
            'provinsi' => Provinsi::all()->toArray(),
            'kabupaten' => Kabupaten::where('provinsi_id', auth()->user()->mitra->provinsi_id)->get()->toArray(),
            'kecamatan' => Kecamatan::where('kabupaten_id', auth()->user()->mitra->kabupaten_id)->get()->toArray()
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
        if (count(PengajuanMitra::all()) == 0) {
            $id = 1;
        } else {
            $id = PengajuanMitra::all()->last()->id + 1;
        }

        $data = $request->validate([
            'mou' => ['file', 'max:2560', 'required'],
            'judul' => ['required'],
            'jenis' => ['required'],
            'lingkup' => ['required'],
            'p_studi' => ['required'],
            'tgl_mulai' => ['required'],
            'keterangan' => ['required']
        ]);
        $data['mou'] = $request->file('mou')->storeAs('pengajuanMoU', $id . '_MOU_' . $data['judul'] . '_' . auth()->user()->mitra->nama . '.pdf');

        PengajuanMitra::create([
            'judul' => $data['judul'],
            'mitra_id' => auth()->user()->mitra->id,
            'jenisKemitraan' => $data['jenis'],
            'ruangLingkup' => collect($data['lingkup'])->implode('+'),
            'tgl_mulai' => $data['tgl_mulai'],
            'prodi_id' => $data['p_studi'],
            'keterangan' => $data['keterangan'],
            'file_mou' => $data['mou']
        ]);

        return redirect(route('viewListPengajuan'));
    }

    public function listPengajuan()  {
        if (auth()->user()->role == 'mitra') {
            $data = PengajuanMitra::with(['mitra', 'prodi', 'verifyPengajuan'])->whereHas('mitra', fn ($query) => $query->where('user_id', auth()->user()->id))->get();
        } else {
            $data = PengajuanMitra::with(['mitra', 'prodi', 'verifyPengajuan'])->get();
        }
        return view('admin.pages.list_pengajuan', ['data' => $data->toArray()]);
    }

    public function detailPengajuan(PengajuanMitra $pengajuan) {
        $data = $pengajuan->load(['mitra', 'prodi', 'verifyPengajuan']);
        $data['ruangLingkup'] = explode('+', $pengajuan->ruangLingkup);
        return view('admin.pages.detail_pengajuan', ['data' => $data->toArray()]);
    }

    public function deletePengajuan(PengajuanMitra $pengajuan) {
        if (count(PengajuanMitra::where('id', $pengajuan->id)->has('verifyPengajuan')->get()) > 0) {
            return redirect(route('viewListPengajuan'))->with('error', 'Data sudah diverifikasi');
        }
        else {
            Storage::delete($pengajuan->file_mou);
            $pengajuan->delete();
        }

        return redirect(route('viewListPengajuan'))->with('success', 'Data pengajuan berhasil dihapus!');
    }

    public function verifyMoU(Request $request) {
        $this->authorize('admin');

        if (count(VerifyPengajuan::all()) == 0) {
            $id = 1;
        } else {
            $id = VerifyPengajuan::all()->last()->id + 1;
        }

        $data = $request->validate([
            'id_pengajuan' => ['required'],
            'tgl_akhir' => ['required'],
        ]);

        $pengajuan = PengajuanMitra::find($data['id_pengajuan']);
        $pengajuan->tgl_berakhir = $data['tgl_akhir'];
        $pengajuan->save();

        $data['valid_mou'] = $request->file('file_verify')->storeAs('VerifyMoU', $id . '_Valid MoU_' . $pengajuan->judul . '_' . $pengajuan->mitra->nama . '.pdf');

        VerifyPengajuan::create([
            'pengajuanKemitraan_id' => $data['id_pengajuan'],
            'admin_id' => auth()->user()->id,
            'status' => 'Disetujui',
            'keterangan' => '',
            'valid_mou' => $data['valid_mou']
        ]);

        return redirect()->back();
    }

    public function tolakMoU(Request $request) {
        $this->authorize('admin');
        $data = $request->validate([
            'id_pengajuan' => 'required',
            'keterangan' => 'required'
        ]);

        VerifyPengajuan::create([
            'pengajuanKemitraan_id' => $data['id_pengajuan'],
            'admin_id' => auth()->user()->id,
            'status' => 'Ditolak',
            'keterangan' => $data['keterangan'],
        ]);

        return redirect()->back();
    }

    public function listMitra() {
        $this->authorize('admin');
        return view('admin.pages.list_mitra', ['data' => Mitra::with(['kabupaten', 'provinsi', 'kriteria'])->get()->toArray()]);
    }

    function detailMitra(Mitra $mitra) {
        $this->authorize('admin');
        $data['Nama Mitra'] = $mitra->nama;
        $data['Nomor Induk Berusaha'] = $mitra->nomorIndukBerusaha;
        $data['Sektor Industri'] = $mitra->sektor->sektor;
        $data['Sifat Mitra'] = $mitra->sifatMitra->kategori;
        $data['Jenis Mitra'] = $mitra->jenisMitra->jenis;
        $data['Klasifikasi'] = $mitra->klasifikasi;
        $data['Jumlah Pegawai'] = $mitra->jumlahPegawai;
        $data['Provinsi'] = $mitra->provinsi->nama;
        $data['Kota/Kabupaten'] = $mitra->kabupaten->nama;
        $data['kecamatan'] = $mitra->kecamatan->nama;
        $data['Alamat Website Perusahaan'] = $mitra->urlWeb;
        $data['Email'] = $mitra->email;
        $data['No. Telepon'] = $mitra->noTelp;
        $data['Linkedin'] = $mitra->linkedin;
        $data['Instagram'] = $mitra->instagram;
        $data['Facebook'] = $mitra->facebook;
        $data['Twitter'] = $mitra->twitter;
        $data['Tiktok'] = $mitra->tiktok;
        $data['Youtube'] = $mitra->youtube;
        return view('admin.pages.detail_mitra', ['data' => $data]);
    }
}

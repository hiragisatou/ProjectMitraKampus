<?php

namespace App\Http\Controllers;

use App\Models\Moa;
use App\Models\Mou;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Kategori;
use App\Models\VerifyMou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    //Dashboard Page
    public function viewDashboard()
    {
        return view('pages.dashboard');
    }

    //Pengajuan MoU Page
    public function viewPengajuan()
    {
        return view('pages.pengajuan-mou');
    }

    //Pengajuan MoU Handler
    public function pengajuanMoU(Request $request)
    {
        if (count(Mou::all()) == 0) {
            $id = 1;
        } else {
            $id = Mou::all()->last()->id + 1;
        }
        $data =  new Mou;
        $data->nomor = $request->nomor_mou;
        $data->judul = $request->judul;
        $data->mitra_id = auth()->user()->role->roleable->id;
        $data->jenis_kemitraan = $request->jenis_kemitraan;
        $data->ruang_lingkup = implode('+', $request->ruang_lingkup);
        $data->tgl_mulai = $request->tgl_mulai;
        $data->keterangan = $request->keterangan;
        $data->mou_file = $request->file('mou')->storeAs('MoU', $id . '_MOU_' . $data->judul . '_' . auth()->user()->role->roleable->nama . '.pdf');
        $data->save();
        return redirect(route('view_list_mou'))->with('success', 'MoU berhasil diajukan.');
    }

    //List Pengajuan MoU Page
    public function viewListMou() {
        if (auth()->user()->role->name == 'mitra') {
            $data = Mou::with(['mitra', 'verifymou'])->where('mitra_id', auth()->user()->role->roleable->id)->get();
        } else {
            $data = Mou::with(['mitra', 'verifymou'])->get();
        }
        return view('pages.list-mou', ['data' => collect($data)->sortByDesc('updated_at')]);
    }

    //Detail Pengajuan MoU Page
    public function viewDetailMou(Mou $mou) {
        return view('pages.detail-mou', ['data' => $mou->load('mitra', 'verifymou')]);
    }

    //Delete MoU
    public function deleteMou(Mou $mou) {
        if ($mou->verifymou != null) {
            return redirect(route('view_list_mou'))->with('error', 'Gagal! Mou sudah diverifikasi.');
        }
        Storage::delete($mou->mou_file);
        $mou->delete();
        return redirect(route('view_list_mou'))->with('success', 'Berhasil! Mou sudah dihapus.');
    }
    //Verify MoU Handler
    public function verificationMou(Request $request) {
        if (count(VerifyMou::all()) == 0) {
            $id = 1;
        } else {
            $id = VerifyMou::all()->last()->id + 1;
        }
        if (isset($request->valid_mou)) {
            $mou = Mou::find($request->mou_id);
            $mou->tgl_akhir = $request->tgl_berakhir;
            $mou->save();
            $data = collect($request)->except(['_token', 'tgl_berakhir', 'valid_mou']);
            $data['valid_mou_file'] = $request->file('valid_mou')->storeAs('verifyMoU', $id . '_Verify MOU_' . $mou->judul . '_' . $mou->mitra->nama . '.pdf');
        } else {
            $data = collect($request)->except(['_token']);
        }
        $data['admin_id'] = auth()->user()->id;
        VerifyMou::updateOrCreate(['mou_id' => $data['mou_id']], $data->toArray());

        return redirect()->back();
    }

    //List Mitra Page
    public function viewListMitra() {
        return view('pages.list-mitra', ['data' => collect(Mitra::all()->load('provinsi', 'kabupaten', 'kriteria'))]);
    }

    //Detail Mitra Page
    public function viewDetailMitra(Mitra $mitra) {
        return view('pages.detail-mitra', ['data' => collect($mitra->load('kriteria', 'sektor', 'sifat', 'jenis', 'kecamatan', 'kabupaten', 'provinsi'))]);
    }

    //Pengajuan MoA Page
    public function viewMoA() {
        $mou = Mou::whereHas('verifyMou', fn (Builder $query) => $query->where('status', 'verify'))->where('mitra_id', auth()->user()->role->roleable->id)->get();
        // dd(date_create($mou->last()->tgl_akhir));
        if (count($mou) == 0) {
            return view('pages.pengajuan-moa_blank', ['message' => 'Anda belum pernah mengajukan MoU.', 'saran' => 'Silahkan mengajukan MoU terlebih dahulu.']);
        } else {
            if (date_create($mou->last()->tgl_akhir) <= now()) {
                return view('pages.pengajuan-moa_blank', ['message' => 'Masa berlaku MoU anda telah berakhir.', 'saran' => 'Silahkan ajukan MoU kembali.']);
            }
            return view('pages.pengajuan-moa', ['jurusan' => Jurusan::all(), 'prodi' => Prodi::all(), 'kategori' => Kategori::all(), 'mou' => $mou->last()]);
        }
    }

    //Pengajuan MoA Handler
    public function pengajuanMoA(Request $request) {
        if (count(Moa::all()) == 0) {
            $id = 1;
        } else {
            $id = Moa::all()->last()->id + 1;
        }
        $data =  new Moa();
        $data->mou_id = $request->mou_id;
        $data->nomor = $request->nomor_moa;
        $data->judul = $request->judul;
        $data->mitra_id = auth()->user()->role->roleable->id;
        $data->jurusan_id = $request->jurusan;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->moa_file = $request->file('moa')->storeAs('MoA', $id . '_MOA_' . $data->judul . '_' . auth()->user()->role->roleable->nama . '.pdf');
        $data->save();
        $data->kategori()->attach($request->kategori);
        $data->prodi()->attach($request->prodi);
        return redirect(route('view_list_moa'))->with('success', 'MoA berhasil diajukan.');

    }

    //List MoA Page
    public function viewListMoa() {
        if (auth()->user()->role->name == 'mitra') {
            $data = Moa::where('mitra_id', auth()->user()->role->roleable->id)->get();
        } else if (auth()->user()->role->name == 'jurusan') {
            $data = Moa::where('jurusan_id', auth()->user()->role->roleable->id)->get();
        } else if (auth()->user()->role->name == 'prodi') {
            $data = Moa::where('jurusan_id', auth()->user()->role->roleable->id)->get();
        } else {
            $data = Moa::all();
        }
        return view('pages.list-moa', ['data' => collect($data->load(['mitra', 'kategori', 'verifymoa', 'prodi']))]);
    }

    //Detail Pengajuan MoU Page
    public function viewDetailMoa(Moa $moa) {
        return view('pages.detail-moa', ['data' => $moa->load(['mitra', 'verifymoa', 'kategori', 'prodi', 'jurusan'])]);
    }
}

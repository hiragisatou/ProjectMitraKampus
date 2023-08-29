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
        $data->mitra_id = auth()->user()->mitra->id;
        $data->jenis_kemitraan = $request->jenis_kemitraan;
        $data->ruang_lingkup = implode('+', $request->ruang_lingkup);
        $data->tgl_mulai = $request->tgl_mulai;
        $data->keterangan = $request->keterangan;
        $data->mou_file = $request->file('mou')->storeAs('MoU', $id . '_MOU_' . $data->nomor . '_' . auth()->user()->mitra->nama . '.pdf');
        $data->save();
        return redirect(route('view_list_mou'))->with('success', 'MoU berhasil diajukan.');
    }

    //List Pengajuan MoU Page
    public function viewListMou() {
        if (auth()->user()->role == 'mitra') {
            $data = Mou::with(['mitra', 'verifymou'])->where('mitra_id', auth()->user()->mitra->id)->get();
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
        if (collect($mou)->has('verifyMou')) {
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
            $pengajuan = Mou::find($request->pengajuan_mou_id);
            $pengajuan->tgl_berakhir = $request->tgl_berakhir;
            $pengajuan->save();
            $data = collect($request)->except(['_token', 'tgl_berakhir']);
            $data['valid_mou'] = $request->file('valid_mou')->storeAs('verifyMoU', $id . '_Verify MOU_' . $pengajuan->name . '_' . $pengajuan->mitra->name . '.pdf');
        } else {
            $data = collect($request)->except(['_token']);
        }
        $data['admin_id'] = auth()->user()->id;
        VerifyMou::updateOrCreate(['pengajuan_mou_id' => $data['pengajuan_mou_id']], $data->toArray());

        return redirect()->back();
    }

    //List Mitra Page
    public function viewListMitra() {
        return view('pages.list-mitra', ['data' => collect(Mitra::all()->load('kecamatan', 'kriteriamitra'))]);
    }

    //Detail Mitra Page
    public function viewDetailMitra(Mitra $mitra) {
        return view('pages.detail-mitra', ['data' => collect($mitra->load('kriteriamitra', 'sektorindustri', 'sifatmitra', 'jenismitra', 'kecamatan', 'pengajuanmou', 'user'))]);
    }

    //Pengajuan MoA Page
    public function viewMoA() {
        return view('pages.pengajuan-moa', ['jurusan' => Jurusan::all(), 'kategori' => Kategori::all()]);
    }

    //Pengajuan MoA Handler
    public function pengajuanMoA(Request $request) {
        if (count(Moa::all()) == 0) {
            $id = 1;
        } else {
            $id = Moa::all()->last()->id + 1;
        }
        $data =  new Moa();
        $data->nomor = $request->nomor_moa;
        $data->judul = $request->judul;
        $data->mitra_id = auth()->user()->mitra->id;
        $data->jurusan_id = $request->jurusan;
        if (count($request->prodi) > 1) {
            $data->send_to = 'jurusan';
        } else {
            $data->send_to = 'prodi';
        }
        $data->prodi_id = implode('+', $request->prodi);
        $data->tgl_mulai = $request->tgl_mulai;
        $data->moa_file = $request->file('moa')->storeAs('pengajuanMoA', $id . '_MOA_' . $data->nomor . '_' . auth()->user()->mitra->nama . '.pdf');
        $data->save();
        $data->kategori()->attach($request->kategori);
        return redirect(route('view_list_moa'))->with('success', 'MoA berhasil diajukan.');

    }

    public function viewListMoa() {
        // dd(MoA::with(['mitra', 'jurusan'])->get()->load('kategori'));
        if (auth()->user()->role == 'mitra') {
            $data = Moa::where('mitra_id', auth()->user()->mitra->id)->get();
        } else {
            $data = Moa::all();
        }
        return view('pages.list-moa', ['data' => collect($data->load(['mitra', 'kategori']))]);
    }
}

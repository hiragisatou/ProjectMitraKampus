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
        return view('pages.pengajuan-mou', ['prodi' => collect(Prodi::all())]);
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
        $data->name = $request->judul;
        $data->mitra_id = auth()->user()->mitra->id;
        $data->jenis_kemitraan = $request->jenis_kemitraan;
        $data->ruang_lingkup = implode('+', $request->ruang_lingkup);
        $data->tgl_mulai = $request->tgl_mulai;
        $data->keterangan = $request->keterangan;
        $data->mou = $request->file('mou')->storeAs('pengajuanMoU', $id . '_MOU_' . $data->name . '_' . auth()->user()->mitra->name . '.pdf');
        $data->save();
        return redirect(route('view_list_pengajuan'))->with('success', 'MoU berhasil diajukan.');
    }

    //List Pengajuan MoU Page
    public function viewListPengajuan() {
        if (auth()->user()->role == 'mitra') {
            $data = Mou::with(['mitra', 'prodi', 'verifymou'])->where('mitra_id', auth()->user()->mitra->id)->get();
        } else {
            $data = Mou::with(['mitra', 'prodi', 'verifymou'])->get();
        }
        return view('pages.list-pengajuan_mou', ['data' => collect($data)->sortByDesc('updated_at')]);
    }

    //Detail Pengajuan MoU Page
    public function viewDetailPengajuan(Mou $mou) {
        $data = $mou;
        $data['ruang_lingkup'] = explode('+', $mou->ruang_lingkup);
        return view('pages.detail-mou', ['data' => $data->load('mitra', 'verifymou', 'prodi')]);
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
        $data->name = $request->judul;
        $data->mitra_id = auth()->user()->mitra->id;
        $data->jurusan_id = $request->jurusan;
        $data->prodi_id = implode('+', $request->prodi);
        $data->tgl_mulai = $request->tgl_mulai;
        $data->moa = $request->file('moa')->storeAs('pengajuanMoA', $id . '_MOA_' . $data->name . '_' . auth()->user()->mitra->name . '.pdf');
        $data->save();
        $data->kategori()->attach($request->kategori);
        return redirect(route('view_list_pengajuan'))->with('success', 'MoA berhasil diajukan.');

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

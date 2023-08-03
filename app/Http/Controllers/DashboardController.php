<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\PengajuanMoU;
use App\Models\Prodi;
use App\Models\VerifyMoU;
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
        if (count(PengajuanMoU::all()) == 0) {
            $id = 1;
        } else {
            $id = PengajuanMoU::all()->last()->id + 1;
        }
        $data = $request->except('_token');
        $data['mitra_id'] = auth()->user()->mitra->id;
        $data['ruang_lingkup'] = implode('+', $request->ruang_lingkup);
        $data['mou'] = $request->file('mou')->storeAs('pengajuanMoU', $id . '_MOU_' . $data['name'] . '_' . auth()->user()->mitra->name . '.pdf');
        PengajuanMoU::create($data);
        return redirect(route('dashboard'))->with('success', 'MoU berhasil diajukan.');
    }

    //List Pengajuan MoU Page
    public function viewListPengajuan() {
        if (auth()->user()->role == 'mitra') {
            $data = PengajuanMoU::with(['mitra', 'prodi', 'verifymou'])->where('mitra_id', auth()->user()->mitra->id)->get();
        } else {
            $data = PengajuanMoU::with(['mitra', 'prodi', 'verifymou'])->get();
        }
        return view('pages.list-pengajuan', ['data' => collect($data)]);
    }

    //Detail Pengajuan MoU Page
    public function viewDetailPengajuan(PengajuanMoU $mou) {
        $data = $mou;
        $data['ruang_lingkup'] = explode('+', $mou->ruang_lingkup);
        return view('pages.detail-mou', ['data' => $data->load('mitra', 'verifymou', 'prodi')]);
    }

    //Verify MoU Handler
    public function verificationMou(Request $request) {
        if (count(VerifyMoU::all()) == 0) {
            $id = 1;
        } else {
            $id = VerifyMoU::all()->last()->id + 1;
        }
        if (isset($request->valid_mou)) {
            $pengajuan = PengajuanMoU::find($request->pengajuan_mou_id);
            $pengajuan->tgl_berakhir = $request->tgl_berakhir;
            $pengajuan->save();
            $data = collect($request)->except(['_token', 'tgl_berakhir']);
            $data['valid_mou'] = $request->file('valid_mou')->storeAs('verifyMoU', $id . '_Verify MOU_' . $pengajuan->name . '_' . $pengajuan->mitra->name . '.pdf');
        } else {
            $data = collect($request)->except(['_token']);
        }
        $data['admin_id'] = auth()->user()->id;
        VerifyMoU::updateOrCreate(['pengajuan_mou_id' => $data['pengajuan_mou_id']], $data->toArray());

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
}

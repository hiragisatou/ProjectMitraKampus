<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\KriteriaMitra;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Setting Prodi Page
    public function indexProdi()
    {
        if (count(Prodi::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(Prodi::all())->last()->id + 1;
        }
        return view('pages.setting.prodi', ['data' => collect(Prodi::all()->load(['jurusan'])), 'jurusan' => collect(Jurusan::all()), 'id' => $id]);
    }

    //Prodi Handler
    public function prodiHandler(Request $request)
    {
        $data = collect($request)->except('_token');
        Prodi::updateOrCreate(['id' => $data['id']], $data->except('id')->toArray());
        return redirect(route('view_prodi'))->with('success', 'Data prodi berhasil disimpan.');
    }

    //Delete Data Prodi
    public function deleteProdi(Prodi $prodi)
    {
        // if ($prodi->PengajuanMoU()->exists()) {
        //     return redirect(route('view_prodi'))->with('error', 'Data prodi sudah pernah melaksanakan kemitraan.');
        // }
        $prodi->delete();
        return redirect(route('view_prodi'))->with('success', 'Data prodi berhasil dihapus.');
    }

    // Setting Kriteria Mitra Page
    public function indexKriteria()
    {
        if (count(KriteriaMitra::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(KriteriaMitra::all())->last()->id + 1;
        }
        return view('pages.setting.kriteria', ['data' => collect(KriteriaMitra::all()), 'id' => $id]);
    }


    //Kriteria Handler
    public function kriteriaHandler(Request $request)
    {
        $data = collect($request)->except('_token');
        KriteriaMitra::updateOrCreate(['id' => $data['id']], $data->except('id')->toArray());
        return redirect(route('view_kriteria'))->with('success', 'Data kriteria berhasil disimpan.');
    }

    //Delete Data Kriteria
    public function deleteKriteria(KriteriaMitra $kriteria)
    {
        // if ($kriteria->mitra()->exists()) {
        //     return redirect(route('view_kriteria'))->with('error', 'Data kriteria sudah dimiliki oleh mitra.');
        // }
        $kriteria->delete();
        return redirect(route('view_kriteria'))->with('success', 'Data kriteria berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

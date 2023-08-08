<?php

namespace App\Http\Controllers;

use App\Models\JenisMitra;
use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\KriteriaMitra;
use App\Models\SektorIndustri;
use App\Models\SifatMitra;
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
        $kriteria->delete();
        return redirect(route('view_kriteria'))->with('success', 'Data kriteria berhasil dihapus.');
    }

    // Setting Sifat Mitra Page
    public function indexSifat()
    {
        if (count(SifatMitra::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(SifatMitra::all())->last()->id + 1;
        }
        return view('pages.setting.sifat', ['data' => collect(SifatMitra::all()), 'id' => $id]);
    }

    //Sifat Mitra Handler
    public function sifatHandler(Request $request)
    {
        $data = collect($request)->except('_token');
        SifatMitra::updateOrCreate(['id' => $data['id']], $data->except('id')->toArray());
        return redirect(route('view_sifat_mitra'))->with('success', 'Data sifat mitra berhasil disimpan.');
    }

    //Delete Data Kriteria
    public function deleteSifat(SifatMitra $sifat)
    {
        $sifat->delete();
        return redirect(route('view_sifat_mitra'))->with('success', 'Data sifat mitra berhasil dihapus.');
    }

    // Setting Jenis Mitra Page
    public function indexJenis()
    {
        if (count(JenisMitra::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(JenisMitra::all())->last()->id + 1;
        }
        return view('pages.setting.jenis', ['data' => collect(JenisMitra::all()), 'id' => $id]);
    }

    //Sifat Mitra Handler
    public function jenisHandler(Request $request)
    {
        $data = collect($request)->except('_token');
        JenisMitra::updateOrCreate(['id' => $data['id']], $data->except('id')->toArray());
        return redirect(route('view_jenis_mitra'))->with('success', 'Data jenis mitra berhasil disimpan.');
    }

    //Delete Data Kriteria
    public function deleteJenis(JenisMitra $jenis)
    {
        $jenis->delete();
        return redirect(route('view_jenis_mitra'))->with('success', 'Data jenis mitra berhasil dihapus.');
    }

    // Setting Sektor Industri Page
    public function indexSektor()
    {
        if (count(SektorIndustri::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(SektorIndustri::all())->last()->id + 1;
        }
        return view('pages.setting.sektor', ['data' => collect(SektorIndustri::all()), 'id' => $id]);
    }

    //Sifat Mitra Handler
    public function sektorHandler(Request $request)
    {
        $data = collect($request)->except('_token');
        SektorIndustri::updateOrCreate(['id' => $data['id']], $data->except('id')->toArray());
        return redirect(route('view_sektor_industri'))->with('success', 'Data sektor industri berhasil disimpan.');
    }

    //Delete Data Kriteria
    public function deleteSektor(SektorIndustri $sektor)
    {
        $sektor->delete();
        return redirect(route('view_sektor_industri'))->with('success', 'Data sektor industri berhasil dihapus.');
    }
}

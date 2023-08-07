<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Setting Prodi Page
    public function indexProdi()
    {
        return view('pages.setting.prodi', ['data' => collect(Prodi::all()->load(['jurusan'])), 'jurusan' => collect(Jurusan::all())]);
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
        if ($prodi->PengajuanMoU()->exists()) {
            return redirect(route('view_prodi'))->with('error', 'Data prodi sudah pernah melaksanakan kemitraan.');
        }
        $prodi->delete();
        return redirect(route('view_prodi'))->with('success', 'Data prodi berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Prodi;
use App\Models\Sifat;
use App\Models\Sektor;
use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
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
        $data['nama'] = $request->name;
        $data['jurusan_id'] = $request->jurusan_id;
        Prodi::updateOrCreate(['id' => $request->id], $data);
        return redirect(route('view_prodi'))->with('success', 'Data prodi berhasil disimpan.');
    }

    //Delete Data Prodi
    public function deleteProdi(Prodi $prodi)
    {
        if ($prodi->jurusan()->moa()->exists()) {
            $prodi->delete();
        } else {
            $prodi->forceDelete();
        }
        return redirect(route('view_prodi'))->with('success', 'Data prodi berhasil dihapus.');
    }

    // Setting Kriteria Mitra Page
    public function indexKriteria()
    {
        if (count(Kriteria::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(Kriteria::all())->last()->id + 1;
        }
        return view('pages.setting.kriteria', ['data' => collect(Kriteria::all()), 'id' => $id]);
    }


    //Kriteria Handler
    public function kriteriaHandler(Request $request)
    {
        $data['nama'] = $request->name;
        Kriteria::updateOrCreate(['id' => $request->id], $data);
        return redirect(route('view_kriteria'))->with('success', 'Data kriteria berhasil disimpan.');
    }

    //Delete Data Kriteria
    public function deleteKriteria(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect(route('view_kriteria'))->with('success', 'Data kriteria berhasil dihapus.');
    }

    // Setting Sifat Mitra Page
    public function indexSifat()
    {
        if (count(Sifat::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(Sifat::all())->last()->id + 1;
        }
        return view('pages.setting.sifat', ['data' => collect(Sifat::all()), 'id' => $id]);
    }

    //Sifat Mitra Handler
    public function sifatHandler(Request $request)
    {
        $data['nama'] = $request->name;
        Sifat::updateOrCreate(['id' => $request->id], $data);
        return redirect(route('view_sifat_mitra'))->with('success', 'Data sifat mitra berhasil disimpan.');
    }

    //Delete Data Sifat
    public function deleteSifat(Sifat $sifat)
    {
        $sifat->delete();
        return redirect(route('view_sifat_mitra'))->with('success', 'Data sifat mitra berhasil dihapus.');
    }

    // Setting Jenis Mitra Page
    public function indexJenis()
    {
        if (count(Jenis::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(Jenis::all())->last()->id + 1;
        }
        return view('pages.setting.jenis', ['data' => collect(Jenis::all()), 'id' => $id]);
    }

    //Jenis Mitra Handler
    public function jenisHandler(Request $request)
    {
        $data['nama'] = $request->name;
        Jenis::updateOrCreate(['id' => $request->id], $data);
        return redirect(route('view_jenis_mitra'))->with('success', 'Data jenis mitra berhasil disimpan.');
    }

    //Delete Data Jenis
    public function deleteJenis(Jenis $jenis)
    {
        $jenis->delete();
        return redirect(route('view_jenis_mitra'))->with('success', 'Data jenis mitra berhasil dihapus.');
    }

    // Setting Sektor Industri Page
    public function indexSektor()
    {
        if (count(Sektor::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(Sektor::all())->last()->id + 1;
        }
        return view('pages.setting.sektor', ['data' => collect(Sektor::all()), 'id' => $id]);
    }

    //Sektor Industri Handler
    public function sektorHandler(Request $request)
    {
        $data['nama'] = $request->name;
        Sektor::updateOrCreate(['id' => $request->id], $data);
        return redirect(route('view_sektor_industri'))->with('success', 'Data sektor industri berhasil disimpan.');
    }

    //Delete Data Sektor
    public function deleteSektor(Sektor $sektor)
    {
        $sektor->delete();
        return redirect(route('view_sektor_industri'))->with('success', 'Data sektor industri berhasil dihapus.');
    }

    // Setting Jurusan Page
    public function indexJurusan()
    {
        if (count(Jurusan::all()) == 0) {
            $id = 1;
        } else {
            $id = collect(Jurusan::all())->last()->id + 1;
        }
        return view('pages.setting.jurusan', ['data' => collect(Jurusan::all()), 'id' => $id]);
    }

    //Jurusan Handler
    public function jurusanHandler(Request $request)
    {
        $data['nama'] = $request->name;
        Jurusan::updateOrCreate(['id' => $request->id], $data);
        return redirect(route('view_jurusan'))->with('success', 'Data jurusan berhasil disimpan.');
    }

    //Delete Data Jurusan
    public function deleteJurusan(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect(route('view_jurusan'))->with('success', 'Data jurusan berhasil dihapus.');
    }

    // Setting User Page
    public function indexUser()
    {
        return view('pages.setting.user', [
        'data' => User::with('role')->whereHas('role', fn (Builder $query) => $query->with('roleable')->whereIn('name', ['jurusan', 'prodi']))->get(),
        'prodi' => collect(Prodi::all()),
        'jurusan' => collect(Jurusan::all()),
        ]);
    }

    //User Handler
    public function userHandler(Request $request)
    {
        $data = collect($request)->except('_token');
        if (isset($data['id'])) {
            $user = User::find($data['id']);
        } else {
            $user = new User;
            $user->email = $data['username'];
        }
        if ($data['password']) {
            $user->password = bcrypt($data['password']);
        }
        if ($data['jenis_user'] == 'jurusan') {
            $type = 'App\Models\Jurusan';
        } elseif ($data['jenis_user'] == 'prodi') {
            $type = 'App\Models\Prodi';
        }
        $user->name = $data['name'];
        $user->email_verified_at = now();
        $user->save();
        if ($user->role != null) {
            $id = $user->role->id;
        } else {
            $id = 0;
        }
        $user->role()->updateOrCreate(['id' => $id], [
            'name' => $data['jenis_user'],
            'roleable_id' => $data['role'],
            'roleable_type' => $type
        ]);

        return redirect(route('view_user'))->with('success', 'Data user berhasil disimpan.');
    }

    //Delete Data User
    public function deleteUser(User $user)
    {
        if (count($user->verifymoa) == 0 && count($user->verifymou) == 0) {
            $user->role()->delete();
            $user->delete();
            return redirect(route('view_user'))->with('success', 'Data user berhasil dihapus.');
        }
        return redirect(route('view_user'))->with('error', 'Data user gagal dihapus karena sudah pernah melakukan verifikasi.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sektor;
use App\Models\Kriteria;
use App\Models\JenisMitra;
use App\Models\Mitra;
use App\Models\SifatMitra;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AutentikasiController extends Controller
{
    // Login Page
    public function index()
    {
        return view('auth.login');
    }

    // Api Login
    public function loginHandler(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    // Api Logout
    public function logoutHandler(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    //Register Page
    public function registerPage()
    {
        return view('auth.register');
    }

    // Api Register
    public function registerHandler(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        if($user->save()){
            event(new Registered($user));

            Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

            return redirect(route('profilMitra'));
        }
    }

    public function profileMitra()
    {
        return view('auth.profileMitra', [
            'sektor' => Sektor::all()->toArray(),
            'jenis' => JenisMitra::all()->toArray(),
            'kriteria' => Kriteria::all()->toArray(),
            'sifat' => SifatMitra::all()->toArray()
        ]);
    }

    public function profileHandler(Request $request)
    {
        if (Auth::check()) {
            Mitra::updateOrCreate(['user_id' => auth()->user()->id],[
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
        } else {
            return redirect(route('login'));
        }

        return redirect(route('verification.notice'));
    }

    public function resetPassword()
    {
        return view('auth.passwords.email');
    }

    public function resetPasswordLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function formReset(string $token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPasswordHandler(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}

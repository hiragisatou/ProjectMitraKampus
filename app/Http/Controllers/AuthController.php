<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\JenisMitra;
use App\Models\SifatMitra;
use Illuminate\Http\Request;
use App\Models\KriteriaMitra;
use App\Models\SektorIndustri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    //Login Page
    public function viewLogin()
    {
        return view('pages.sign-in');
    }

    //Register Page
    public function viewRegister()
    {
        return view('pages.sign-up');
    }

    //Login Handler
    public function loginHandler(Request $request)
    {
        if ($remember = collect($request)->has('remember')) {
            $credentials = $request->except(['_token', 'remember']);
        }
        else {
            $credentials = $request->except('_token');
        }
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Register Handler
    public function registerHandler(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            event(new Registered($user));
            Auth::attempt(collect($request)->only(['email', 'password'])->toArray());
            return redirect(route('verification.notice'));
        }

    }

    //Verification Email Page
    public function viewVerifyNotice()
    {
        return view('pages.verify-mail-notice');
    }

    //Verify the email
    public function verificationMailHandler(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect(route('dashboard'));
    }

    //Resent link verification email
    public function verificationSend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Link verifikasi berhasil dikirim!');
    }

    // Add Profile Page
    public function viewAddProfile() {
        return view('pages.profile', [
            'jenis' => collect(JenisMitra::all()),
            'kriteria' => collect(KriteriaMitra::all()),
            'provinsi' => collect(Provinsi::all()),
            'sektor' => collect(SektorIndustri::all()),
            'sifat' => collect(SifatMitra::all())
        ]);
    }

    //Edit Profile Page
    public function viewEditProfile() {
        return view('pages.profile', [
            'mitra' => auth()->user()->mitra,
            'jenis' => collect(JenisMitra::all()),
            'kriteria' => collect(KriteriaMitra::all()),
            'provinsi' => collect(Provinsi::all()),
            'kabupaten' => collect(Kabupaten::where('provinsi_id', auth()->user()->mitra->kecamatan->kabupaten->provinsi_id)->get()),
            'kecamatan' => collect(Kecamatan::where('kabupaten_id', auth()->user()->mitra->kecamatan->kabupaten_id)->get()),
            'sektor' => collect(SektorIndustri::all()),
            'sifat' => collect(SifatMitra::all())
        ]);
    }

    //Profile Handler
    public function profileHandler(Request $request)
    {
        $data = collect($request)->except(['_token', 'kabupaten', 'provinsi']);
        $data['user_id'] = auth()->user()->id;
        Mitra::updateOrCreate(['user_id' => auth()->user()->id],$data->toArray());
        return redirect(route('dashboard'))->with('success', 'Data profil perusahaan berhasil disimpan.');
    }

    public function viewForgotPassword() {
        return view('pages.forgot-password');
    }

    //Update Account Page
    public function viewUpdateAccount(){
        return view('pages.update-akun', ['data' => auth()->user()]);
    }

    //Update Account Handlerr
    public function updateAccountHandler(Request $request){
        if (isset($request->confirm_password)) {
            $data = collect($request)->except(['_token', 'confirm_password', 'old_password']);
        } else {
            $data = collect($request)->except(['_token', 'old_password']);
        }

        $data['password'] = bcrypt($request->password);
        User::where('email', $data['email'])->update($data->except(['email'])->toArray());
        return redirect(route('dashboard'))->with('success', 'Data akun berhasil di update!');
    }

    //Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}

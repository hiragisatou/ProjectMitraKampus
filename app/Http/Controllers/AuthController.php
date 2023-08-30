<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Mitra;
use App\Models\Sifat;
use App\Models\Sektor;
use App\Models\Kriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
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
            'jenis' => collect(Jenis::all()),
            'kriteria' => collect(Kriteria::all()),
            'sektor' => collect(Sektor::all()),
            'sifat' => collect(Sifat::all())
        ]);
    }

    //Edit Profile Page
    public function viewEditProfile() {
        return view('pages.profile', [
            'mitra' => auth()->user()->role->roleable,
            'jenis' => collect(Jenis::all()),
            'kriteria' => collect(Kriteria::all()),
            'sektor' => collect(Sektor::all()),
            'sifat' => collect(Sifat::all())
        ]);
    }

    //Profile Handler
    public function profileHandler(Request $request)
    {
        $data = collect($request)->only(['nama', 'nib', 'kriteria_id', 'sektor_id', 'sifat_id', 'jenis_id', 'klasifikasi', 'jumlah_pegawai', 'url', 'email', 'alamat', 'no_telp', 'linkedin', 'instagram', 'facebook', 'twitter', 'tiktok', 'youtube']);
        $data = collect($request)->except(['_token', 'kabupaten', 'provinsi']);
        $data['user_id'] = auth()->user()->id;
        $data['kecamatan_id'] = $request->kecamatan;
        $data['kabupaten_id'] = $request->kabupaten;
        $data['provinsi_id'] = $request->provinsi;
        $mitra = Mitra::updateOrCreate(['user_id' => auth()->user()->id], $data->toArray());
        Role::updateOrCreate(['user_id' => auth()->user()->id], ['name' => 'mitra', 'roleable_id' => $mitra->id, 'roleable_type' => 'App\Models\Mitra', 'user_id' => auth()->user()->id]);
        return redirect(route('dashboard'))->with('success', 'Data profil perusahaan berhasil disimpan.');
    }

    public function viewForgotPassword() {
        return view('pages.forgot-password');
    }

    public function forgotPasswordHandler(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? back()->with(['status' => __($status)]) : back()->withErrors(['email' => __($status)]);
    }

    public function viewResetPassword(string $token) {
        return view('pages.reset-password', ['token' => $token]);
    }

    public function resetPasswordHandler(Request $request) {
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

        return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('status', __($status)) : back()->withErrors(['email' => [__($status)]]);
    }

    //Update Account Page
    public function viewUpdateAccount(){
        return view('pages.update-akun', ['data' => auth()->user()]);
    }

    //Update Account Handler
    public function updateAccountHandler(Request $request){
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['errorPassword' => 'Password tidak sesuai!'])->withInput();
        }
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

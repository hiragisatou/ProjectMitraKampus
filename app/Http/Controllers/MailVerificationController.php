<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class MailVerificationController extends Controller
{
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyConfirm(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect(route('dashboard'));
    }

    public function verifySend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim, Silahkan cek email anda!');
    }
}

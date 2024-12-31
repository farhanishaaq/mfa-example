<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FAQRCode\Google2FA;



class TwoFactorController extends Controller
{
    public function enableTwoFactor(Request $request)
    {
        $user = Auth::user();
        $google2fa = app(Google2FA::class);
//        dd($google2fa);
        $user->google2fa_secret = $google2fa->generateSecretKey();
        $user->save();

        $QRImage = $google2fa->getQRCodeInline(config('app.name'), $user->email, $user->google2fa_secret);
        return view('2fa.enable', ['QRImage' => $QRImage, 'secret' => $user->google2fa_secret]);
    }

    public function verifyTwoFactor(Request $request)
    {
        $google2fa = app(Google2FA::class);
        $user = Auth::user();
        $secret = $request->input('secret');

        if ($user->google2fa_secret == $secret) {
            return redirect('/home')->with('success', 'Two-Factor Authentication enabled successfully.');
        }
        return redirect()->back()->with('error', 'Invalid 2FA token, please try again.');
    }

    public function index()
    {
        return view('auth.2fa');
    }



    public function resend()
    {
        $user = Auth::user();
        $user->generateTwoFactorCode(); // Send the 2FA code via email or other means here return redirect()->back()->withMessage('2FA code has been resent.');}

    }



}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class LoginController extends Controller
{
    public function index() {      
          
        return view('auth.login');
    }
    
    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $remember = $request->remember;

        if (!auth()->attempt($request->only('email', 'password'), $remember)) {
            return back()->with('status', 'Email ou mot de passe invalide. Veuillez réessayer');
        }

        return redirect()->route('dashboard');
    }

    public function forgotpassword() {
        return view('auth.forgotpassword');
    }

    public function sendemail(Request $request) {

        $this->validate($request, [
            'email' => 'required|exists:users,email|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

    }

    public function resetpasswordview($token) {
        return view('auth.resetpassword', ['token'=>$token]);
    }

    public function resetpassword(Request $request) {

        $request->validate([
            'token' => 'required',
            'email' => 'required|exists:users,email|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
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

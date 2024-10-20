<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Helper;

class AuthController extends Controller
{
    function login() : View {
        return view("Auth/login");
    }

    function loginAttempt(Request $request) {
        $captcha = Helper::CheckCaptcha($request->gRecaptchaResponse);
        if ( !$captcha )
            return back()
                ->withErrors("Captcha hiba!")
                ->withInput();
        
        $password = $request->password;

        $users = User::all();
        foreach ($users as $user) {
            if ( Hash::check($password, $user->password) ) {
                Auth::login($user);
                $user->last_login = \Carbon\Carbon::now();
                $user->save();
            }
        }
        
        
        if ( Auth::check() ) {
            return redirect()->route("admin.dashboard");
        } else {
            return back()->withErrors("Hibás jelszó!")->withInput();
        }
    }

    function logout() {
        Auth::logout();

        return redirect()->route("login");
    }
}

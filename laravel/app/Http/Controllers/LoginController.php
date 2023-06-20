<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index()
   {
    return view('sign_in');
   }
   public function login(Request $request)
   {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Email atau password salah']);
    }

   public function logout(Request $request)
   {
      Auth::logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();

      return redirect(route('login'));
   }
}

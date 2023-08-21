<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function save(Request $request) {
        //Validations
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Sign in the user
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid login credentials');
        };

        //Redirect the user
        return redirect()->route('dashboard');
    }
}

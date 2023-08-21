<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function register() {
        return view('auth.register');
    }

    public function add(Request $request) {
        //Validations
        $this->validate($request, [
            'name' => 'required|max:255',
            'uname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        //Store the user
        User::create([
            'name' => $request->name,
            'username' => $request->uname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        //Sign in the user
        auth()->attempt($request->only('email', 'password'));

        //Redirect the user
        return redirect()->route('dashboard');
    }
}

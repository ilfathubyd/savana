<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DataUser;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:accounts_users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:255',
        ]);

        $data_user = DataUser::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);

        return view('/login');;
    }

    public function logins(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email', 
        ]);

        $credentials = $request->only('email');

        if (Auth::attempt($credentials)) {
            return redirect()->route('userLanding');
        }

        return view('userLanding');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful!'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register'); 
    }

    public function postRegister(Request $request)
    {
        
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|unique:users,phone',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ], [
            'phone.regex' => 'Telefon raqami noto‘g‘ri formatda.',
            'phone.unique' => 'Bu telefon raqami allaqachon ro‘yxatdan o‘tgan.',
            'password.mixedCase' => 'Parolda katta va kichik harf bo‘lishi kerak.',
            'password.numbers'   => 'Parolda raqam bo‘lishi kerak.',
        ]);
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Ro‘yxatdan o‘tgandan keyin avto-kirish

        return redirect()->route('dashboard')->with('success', 'Xush kelibsiz, ' . $user->name . '!');
    }
}
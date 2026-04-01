<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class WargaRegisterController extends Controller
{
    public function create()
    {
        return view('auth.register-warga');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'alamat'   => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'alamat.required'    => 'Alamat wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'alamat'   => $request->alamat,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'warga',
        ]);

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('warga.dashboard');
    }
}
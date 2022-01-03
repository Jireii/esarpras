<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:3',
            'password' => 'required|min:3',
            'role' => 'required',
            'nama' => 'required',
            'nik' => 'max:16',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'gambar' => 'image|file|max:1024',
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['telp'] = $request->telp;
        $validatedData['alamat'] = $request->alamat;
        $validatedData['jabatan'] = $request->jabatan;
        $validatedData['agama'] = $request->agama;
        $validatedData['gender'] = $request->gender;
        
        if($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('user-images');
        }

        // dd($validatedData);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}

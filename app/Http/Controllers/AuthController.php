<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function getRegister()
    {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:3',
            'password' => 'required|min:3',
            'role' => 'required',
            'nama' => 'required',
            'nik' => 'max:16',
            'tanggal_lahir' => 'required',
            'email' => 'required',
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['telp'] = $request->telp;
        $validatedData['alamat'] = $request->alamat;
        $validatedData['jabatan'] = $request->jabatan;
        $validatedData['agama'] = $request->agama;
        $validatedData['gender'] = $request->gender;
        
        if($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '_' . $gambar->getClientOriginalName();
            $img = Image::make($gambar);
            $img->save(\public_path("img/$file_name"), 20, 'jpg');
            $validatedData['gambar'] = $file_name;
        }

        // dd($validatedData);
        User::create($validatedData);

        return redirect('/register')->with('success', 'Registrasi berhasil!');
    }

    public function edit(User $user)
    {
        return view('auth.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
         $rules = [
            'nama' => 'required',
            'nik' => 'max:16',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
            'agama' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['telp'] = $request->telp;
        $validatedData['alamat'] = $request->alamat;

        if( $request->file('gambar') ) {
            if($user->gambar) {
                File::delete(public_path('/img/'. Auth::user()->gambar));
            }
            $gambar = $request->file('gambar');
            $file_name = time() . '_' . $gambar->getClientOriginalName();
            $img = \Image::make($gambar);
            $img->save(\public_path("img/$file_name"), 20, 'jpg');
            $validatedData['gambar'] = $file_name;
        }

        if ($request->passlama) {
            $currentpasshash = htmlspecialchars($user->password);
            $passlama = htmlspecialchars($request->passlama);
            $passbaru1 = htmlspecialchars($request->passbaru1);
            $passbaru2 = htmlspecialchars($request->passbaru2);

            if (password_verify($passlama, $currentpasshash)) {
                if($passbaru1 == '' && $passbaru2 == '') {
                    return redirect("/pengguna/" . auth()->user()->id . "/edit")->with('failed', 'Password yang baru tidak kosong!');
                } else {
                    if ($passbaru1 === $passbaru2 ) {
                        $passbaru2 = password_hash($passbaru2, PASSWORD_DEFAULT);

                        User::where('id', auth()->user()->id)->update($validatedData);

                        return redirect("/pengguna")->with('success', 'Password berhasil diganti!');
                    } else {
                        return redirect("/pengguna/" . auth()->user()->id . "/edit")->with('failed', 'Password yang dimasukkan tidak sama!');
                    }
                }    
            } else {
                return redirect("/pengguna/" . auth()->user()->id . "/edit")->with('failed', 'Password yang lama salah!');
            }
        }

        User::where('id', auth()->user()->id)->update($validatedData);
        
        return redirect("/pengguna")->with('success', 'Edit Profile berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

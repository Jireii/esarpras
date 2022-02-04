<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if (auth()->user()->role !== 'Superuser') {
            abort(403);
        }
        return view('user.index', [
            'user' => $user->where('id', auth()->user()->id)->first()
        ]);
    }

    public function userlist(User $user)
    {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
        return view('user.userlists', [
            'users' => $user->all()
        ]);
    }

    public function details(User $user)
    {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
        return view('user.detail', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
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
            $img = Image::make($gambar);
            $img->save(\public_path("img/$file_name"), 20, 'jpg');
            $validatedData['gambar'] = $file_name;
        }

        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect("/users/" . auth()->user()->id)->with('success', 'Edit user berhasil!');
    }

    public function destroy($id)
    {
        if(auth()->user()->role !== 'Superuser') {
            return redirect('/');
        }
        $data = User::find($id);
        $nama = $data->nama;
        $data->delete();

        return redirect('/pengguna')->with('status', 'Berhasil menghapus user '.$nama.'.');
    }
}

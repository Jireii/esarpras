<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Asset;
use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $role = Auth::user()->role;
        $datas = Space::all();
        // dd($datas);
        return view('space.index', [
            // 'role' => $role,
            'datas' => $datas,
            'title' => 'Ruangan',
        ]);
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role == 'guest') {
        //     abort(403);
        // }

        $input = new Space;

        $input->nama = $request->nama;
        $input->save();

        return redirect()->back()->with('status', 'Berhasil menambahkan ruangan "'.$request->nama.'".');
    }

    public function edit(Request $request, $id)
    {
        // if (auth()->user()->role == 'guest') {
        //     abort(403);
        // }
        $token = $request->session()->token();
        $token = csrf_token();

        $input = Space::find($id);
        $nama = $input->nama;

        $input->nama = $request->nama;
        $input->update();

        return redirect()->back()->with('status', 'Berhasil menyunting nama ruangan "'.$nama.'" menjadi "'.$request->nama.'".');
    }

    public function destroy($id)
    {
        // if(auth()->user()->role == 'guest') {
        //     abort(403);
        // }

        $input = Space::find($id);

        $assets = Asset::all();
        $books = Book::all();
        foreach($assets as $asset)
        {
            if ($asset->space_id == $id)
            {
                    $change = Asset::find($asset->id);
                    $change->space_id = null;
                    // dd($change->space_id);
                    $change->update();
            }
        }
        foreach($books as $book)
        {
            if ($book->space_id == $id)
            {
                    $change = Book::find($asset->id);
                    $change->space_id = null;
                    // dd($change->space_id);
                    $change->update();
            }
        }

        $nama = $input->nama;
        $input->delete();

        return redirect('/ruangan')->with('status', 'Berhasil menghapus ruangan '.$nama.'.');
    }
}

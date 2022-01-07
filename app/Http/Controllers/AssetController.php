<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Space;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        // $datas = Asset::join('space', 'asset.space_id', 'space.id')
        // ->select
        // (
        //     'asset.id',
        //     'asset.nama',
        //     'asset.gambar',
        //     'asset.merk',
        //     'asset.tipe',
        //     'asset.register',
        //     'asset.harga',
        //     'asset.tahun_beli',
        //     'asset.dana',
        //     'asset.kondisi',
        //     'asset.space_id',
        //     'space.nama',
        // )
        // ->get();
        // dd($datas);
        return view('asset.index', [
            // 'datas' => Asset::with('Space')->get(),
            'datas' => $datas
        ]);
    }

    public function create(Request $request)
    {
        // if (auth()->user()->role == 'Guest')
        // {
        //     abort(403);
        // }

        return view('asset.create'. [
            'datas' => Asset::all(),
        ]) ;
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role == 'Guest')
        // {
        //     abort(403);
        // }

        $input = new Asset;

        $input->nama = $request->nama;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->extension();
            $gambar->move(public_path('images'), $gambarName);
            $input->file = $gambarName;
        }
        $input->merk = $request->merk;
        $input->tipe = $request->tipe;
        $input->register = $request->register;
        $input->harga = $request->harga;
        $input->tahun_beli = $request->tahun_beli;
        $input->dana = $request->dana;
        $input->kondisi = $request->kondisi;
        $input->space_id = $request->space_id;
        $input->save();

        return redirect()->back()->with('status', 'Sarpras "'.$request->nama.'" berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // if (auth()->user()->role == 'Guest')
        // {
        //     abort(403);
        // }

        return view('asset.new.php', [

        ]);
    }

    public function update($id)
    {
        // if (auth()->user()->role == 'Guest')
        // {
        //     abort(403);
        // }

    }

    public function destroy($id)
    {
        // if (auth()->user()->role == 'Guest')
        // {
        //     abort(403);
        // }

        $input = Asset::find($id);
        $input->delete();

        return redirect('/sarpras');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AssetController extends Controller
{
    public function index()
    {
        return view('asset.index', [
            'datas' => Asset::all(),
        ]);
    }

    public function detail($id){
        $data = Asset::find($id);

        return view('asset.detail', [
            'data' => $data,
        ]);
    }

    public function add()
    {
        return view('asset.add', [
            'spaces' => Space::all()->values('id', 'nama'),
            'title' => 'e-Sarpas - Tambah Sarpras'
        ]);
    }

    public function store(Request $request){
        $input = new Asset;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $input->gambar = $imageName;
        } else {
            $input->gambar = 'default_asset.png';
        }

        $input->nama = $request->nama;
        $input->merk = $request->merk;
        $input->tipe = $request->tipe;
        $input->register = $request->register;
        $input->harga = $request->harga;
        $input->tahun_beli = $request->tahun_beli;
        $input->dana = $request->dana;
        $input->space_id = $request->space_id;

        $input->save();

        return redirect()->back()->with('status', 'Sarpras "'.$request->nama.'" berhasil ditambahkan.');
    }

    public function edit(Asset $data){
        return view('book.edit', [
            'data' => $data,
            'spaces' => Space::all()->values('id', 'nama')
        ]);
    }

    public function update(Request $request, $id){
        $input = Asset::find($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $input->gambar = $imageName;
        } else {
            $input->gambar = $input->gambar;
        }

        $input->nama = $request->nama;
        $input->merk = $request->merk;
        $input->tipe = $request->tipe;
        $input->register = $request->register;
        $input->harga = $request->harga;
        $input->tahun_beli = $request->tahun_beli;
        $input->dana = $request->dana;
        $input->space_id = $request->space_id;

        $input->save();

        return redirect()->back()->with('status', 'Sarpras berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Asset::find($id);
        $nama = $data->nama;
        $data->delete();

        return redirect('/sarpras')->with('status', 'Berhasil menghapus sarpras "'.$nama.'".');
    }
}

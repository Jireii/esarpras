<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Space;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

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
            'spaces' => Space::all(),
            'title' => 'e-Sarpras - Detail Sarpras'
        ]);
    }

    public function add()
    {
        return view('asset.add', [
            'spaces' => Space::where('id', '!=', 1)->get(),
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

    public function edit($id){
        $data = Asset::find($id);
        $nama = '$data->nama';
        return view('asset.edit', [
            'data' => $data,
            'spaces' => Space::all(),
            'title' => 'e-Sapras - Edit Aset'
        ]);
    }

    public function update(Request $request, $id){
        $input = Asset::find($id);

        if ($request->hasFile('gambar')) {
            // $imageOldExt = $book->gambar;
            // $imageOldExt = explode('.', $imageOldExt);
            // $imageOldExt = $imageOldExt[1];
            // dd($imageOldExt);
            // $imageOld = '/images/'.$input->gambar.$imageOldExt;      // bruh im so dumb.
            if ($input->gambar !== 'default_asset.png') {
                $imageOld = '/images/'.$input->gambar;
                File::delete(public_path($imageOld));
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $img = Image::make($image);
            $img->save(public_path("images/$imageName"), 20, 'jpg');
            $input->gambar = $imageName;
        } else {
            $input->gambar = $input->gambar;
        }

        $input->nama = $request->nama;
        $input->merk = $request->merk;
        $input->tipe = $request->tipe;
        $input->register = $request->register;
        $harga = str_replace('.', '', $request->harga);
        $input->harga = $harga;
        $input->tahun_beli = $request->tahun_beli;
        $input->dana = $request->dana;
        $input->space_id = $request->space_id;

        $input->save();

        return redirect('/sarpras/'.$input->id.'/detail')->with('status', 'Sarpras berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Asset::find($id);
        $nama = $data->nama;
        $data->delete();

        return redirect('/sarpras')->with('status', 'Berhasil menghapus sarpras "'.$nama.'".');
    }
}

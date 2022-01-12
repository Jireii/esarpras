<?php

namespace App\Http\Controllers;

use view;
use App\Models\Book;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', [
            'datas' => Book::all(),
        ]);
    }

    public function detail($id){
        $data = Book::find($id);

        return view('book.detail', [
            'data' => $data,
        ]);
    }

    public function add()
    {
        return view('book.add', [
            'spaces' => Space::all()->values('id', 'nama')
        ]);
    }

    public function store(Request $request){
        $book = new Book;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $book->gambar = $imageName;
        } else {
            $book->gambar = 'default_book.png';
        }

        $rp = (int)str_replace([',', '.', 'Rp', ' '], '', $request->harga);

        $book->judul = $request->judul;
        $book->nomor_buku = $request->nomor_buku;
        $book->pengarang = $request->pengarang;
        $book->penerbit = $request->penerbit;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->halaman = $request->halaman;
        $book->register = $request->register;
        $book->tahun_beli = $request->tahun_beli;
        $book->harga = $rp;
        $book->dana = $request->dana;
        $book->kondisi = $request->kondisi;
        $book->space_id = $request->space_id;

        $book->save();
        return redirect()->back()->with('status', 'Buku berhasil ditambahkan');
    }

    public function edit(Book $book){
        return view('book.edit', [
            'data' => $book,
            'spaces' => Space::all()->values('id', 'nama')
        ]);
    }

    public function update(Request $request, $id){
        $book = Book::find($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $book->gambar = $imageName;
        } else {
            $book->gambar = $book->gambar;
        }

        $rp = (int)str_replace([',', '.', 'Rp', ' '], '', $request->harga);

        $book->judul = $request->judul;
        $book->nomor_buku = $request->nomor_buku;
        $book->pengarang = $request->pengarang;
        $book->penerbit = $request->penerbit;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->halaman = $request->halaman;
        $book->register = $request->register;
        $book->tahun_beli = $request->tahun_beli;
        $book->harga = $rp;
        $book->dana = $request->dana;
        $book->kondisi = $request->kondisi;
        $book->space_id = $request->space_id;

        $book->save();
        return redirect()->back()->with('status', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Book::find($id);
        $judul = $data->judul;
        $data->delete();

        return redirect('/buku')->with('status', 'Berhasil menghapus buku '.$judul.'.');
    }
}

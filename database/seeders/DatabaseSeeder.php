<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Asset;
use App\Models\Space;
use App\Models\Notice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Space::create([
            'nama' => 'Perpustakaan'
        ]);

        Space::create([
            'nama' => 'RPS 1'
        ]);

        Space::create([
            'nama' => 'RPS 2'
        ]);

        Space::create([
            'nama' => 'RPS 3'
        ]);

        Asset::create([
            'nama' => 'Laptop',
            'merk' => 'ASUS',
            'tipe' => 'A409FJ',
            'register' => 'LP190202BD001',
            'harga' => 8500000,
            'tahun_beli' => 2019,
            'dana' => 'BOSDA',
            'space_id' => 1
        ]);

        Book::create([
            'judul' => 'Francis of the Filth',
            'gambar' => 'default_book.png',
            'nomor_buku' => NULL,
            'pengarang' => 'George Miller',
            'penerbit' => 'lulu.com',
            'tahun_terbit' => '2017',
            'halaman' => '155',
            'register' => NULL,
            'tahun_beli' => '2018',
            'harga' => '149000',
            'dana' => 'BOS',
            'kondisi' => 'Baik',
            'space_id' => NULL
        ]);

        User::create([
            'username' => 'super',
            'password' => bcrypt('super'),
            'role' => 'Superuser',
            'nama' => 'Superuser',
            'nik' => '10291257953',
            'email' => 'superuser@esarpras.com',
            'telp' => '02179182676',
            'alamat' => 'localhost 8000',
            'jabatan' => 'Guru',
            'agama' => 'Islam',
            'gender' => 'Laki-laki'
        ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'Administrator',
            'nama' => 'Administrator',
            'nik' => '10291257953',
            'email' => 'administrator@esarpras.com',
            'telp' => '02179182676',
            'alamat' => 'localhost 8000',
            'jabatan' => 'Guru',
            'agama' => 'Islam',
            'gender' => 'Laki-laki'
        ]);

        User::create([
            'username' => 'guest',
            'password' => bcrypt('guest'),
            'role' => 'Guest',
            'nama' => 'Guest',
            'nik' => '10291257953',
            'email' => 'guest@esarpras.com',
            'telp' => '02179182676',
            'alamat' => 'localhost 8000',
            'jabatan' => 'Guru',
            'agama' => 'Islam',
            'gender' => 'Laki-laki'
        ]);

        Notice::create([
            'user_id' => NULL,
            'isi' => 'Selamat datang di website e-Sarpras!'
        ]);
    }
}

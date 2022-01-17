<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Space;
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
            'nama' => '-'
        ]);

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
    }
}

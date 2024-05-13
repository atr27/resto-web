<?php

namespace Database\Seeders;

use App\Models\DaftarMakananMinuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftarMakananMinumanSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makanan = new DaftarMakananMinuman();
        $makanan->fill([
            'nama_makanan_minuman' => 'Nasi Goreng',
            'harga' => 15000,
            'stok' => 100,
        ]);
        $makanan->save();

        $baso = new DaftarMakananMinuman();
        $baso->fill([
            'nama_makanan_minuman' => 'Mie Baso',
            'harga' => 10000,
            'stok' => 50,
        ]);
        $baso->save();

        $ayam_geprek = new DaftarMakananMinuman();
        $ayam_geprek->fill([
            'nama_makanan_minuman' => 'Ayam Geprek',
            'harga' => 12000,
            'stok' => 30,
        ]);
        $ayam_geprek->save();

        $jus = new DaftarMakananMinuman();
        $jus->fill([
            'nama_makanan_minuman' => 'Jus Buah',
            'harga' => 7000,
            'stok' => 50,
        ]);
        $jus->save();
    }
}

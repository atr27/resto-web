<?php

namespace Database\Seeders;

use App\Models\Restoran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestoranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restoran = new Restoran();
        $restoran->nama_restoran = 'Restoran ATR';
        $restoran->alamat = 'Jl. Pabaki 1, Bandung';
        $restoran->no_telp = '081563963956';
        $restoran->nama_pemilik = 'Pemilik ATR';
        $restoran->save();
    }
}

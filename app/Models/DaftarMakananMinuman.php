<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMakananMinuman extends Model
{
    use HasFactory;

    protected $table = 'daftar_makanan_minuman';
    protected $primaryKey = 'id_makanan_minuman';
    protected $fillable = [
        'nama_makanan_minuman',
        'harga',
        'stok',
    ];
}

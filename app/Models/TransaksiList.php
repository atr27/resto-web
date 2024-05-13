<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiList extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_transaksi',
        'id_makanan_minuman',
        'nama',
        'harga',
        'quantity'
    ];
}

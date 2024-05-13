<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $table = 'restoran';
    protected $fillable = [
        'nama_restoran',
        'alamat',
        'no_telp',
        'nama_pemilik',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_code',
        'id_user',
        'total_harga',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->transaksi_code = $model->getRandomString();
        });
    }

    public function generateRandomString($length = 6)
    {
        $huruf = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjangHuruf = strlen($huruf);
        $hurufRandom = '';
        for ($i=0; $i < $length; $i++) {
            $hurufRandom .= $huruf[rand(0,$panjangHuruf-1)];
        }
        return $hurufRandom . "" . date("YmdHis");
    }

    public function getRandomString()
    {
        $str = $this->generateRandomString();
        return $str;
    }

    public function items_makanan_minuman()
    {
        return $this->hasMany(TransaksiList::class, 'id_transaksi');
    }

}


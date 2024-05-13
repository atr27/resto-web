<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarMakananMinuman;
use App\Models\Transaksi;
use App\Models\TransaksiList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi.index', ['page_title'=>'Bukti Transaksi', 'hasilTransaksi'=> $transaksi]);
    }

    public function create()
    {
        $data_makanan_minuman = DaftarMakananMinuman::all();
        return view('admin.transaksi.create', ['data'=>$data_makanan_minuman, 'page_title' => 'Buat Transaksi']);
    }

    public function save(Request $request){
       $transaksi = new Transaksi();
       $transaksi->fill([
            'id_user'=> Auth::id(),
            'total_harga' => $request->get('total_harga')
       ]);
       $transaksi->save();
       $no_id = 0;
       foreach ($request->get('id_makanan_minuman') as $id_data) {
            $data_makanan_minuman = DaftarMakananMinuman::findOrFail($id_data);
            $transaksi_item = new TransaksiList();
            $transaksi_item->fill([
                'id_transaksi'=> $transaksi->id,
                'id_makanan_minuman'=> $id_data,
                'nama'=> $data_makanan_minuman->nama_makanan_minuman,
                'harga'=> $data_makanan_minuman->harga,
                'quantity'=> $request->get('quantity')[$no_id]
            ]);
            $transaksi_item->save();
            $no_id++;
       }
       return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    public function delete($id) {
        $transaksi= Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }
}

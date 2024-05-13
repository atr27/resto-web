<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMakananMinumanRequest;
use App\Http\Requests\EditMakananMinumanRequest;
use App\Models\DaftarMakananMinuman;
use Illuminate\Http\Request;

class DaftarMakananMinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarMakananMinuman::all();
        return view('admin.manage.daftar_makanan_minuman.index', ['page_title' => 'Daftar Makanan & Minuman', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage.daftar_makanan_minuman.create',['page_title'=>'Tambah Data Makanan atau Minuman']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMakananMinumanRequest $request)
    {
        $data = new DaftarMakananMinuman();
        $data->fill($request->all());
        $data->save();
        return redirect()->route('daftar_makanan_minuman.index')->with('success', 'Data Makanan atau Minuman Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarMakananMinuman $daftarMakananMinuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarMakananMinuman $daftarMakananMinuman)
    {
        return view('admin.manage.daftar_makanan_minuman.edit',['page_title'=>'Edit Data Makanan atau Minuman','data'=>$daftarMakananMinuman]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditMakananMinumanRequest $request, DaftarMakananMinuman $daftarMakananMinuman)
    {
        $daftarMakananMinuman->update($request->all());
        return redirect()->route('daftar_makanan_minuman.index')->with('success', 'Data Makanan atau Minuman Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarMakananMinuman $daftarMakananMinuman)
    {
        $daftarMakananMinuman->delete();
        return redirect()->route('daftar_makanan_minuman.index')->with('success', 'Data Makanan atau Minuman Berhasil Dihapus');
    }
}

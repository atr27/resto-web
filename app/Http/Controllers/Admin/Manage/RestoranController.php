<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restoran;
use App\Http\Requests\UpdateInfoRestoRequest;

class RestoranController extends Controller
{
    public function index(){
        $resto = Restoran::first();

        return view('admin.manage.restoran.index', ['page_title'=>'Informasi Restoran', 'resto'=>$resto]);
    }

    public function update(UpdateInfoRestoRequest $request){
        $resto = Restoran::first();
        $resto->update($request->all());

        return redirect()->route('restoran.index')->with('success', 'Informasi Restoran berhasil diubah');
    }
}


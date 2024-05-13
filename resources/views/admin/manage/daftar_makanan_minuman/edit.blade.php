@extends('layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('daftar_makanan_minuman.update',$data->id_makanan_minuman)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_makanan_minuman">Nama Makanan atau Minuman</label>
                    <input type="text" name="nama_makanan_minuman" id="nama_makanan_minuman" class="form-control @error('nama_makanan_minuman') is-invalid @enderror" placeholder="Nama Makanan / Minuman" value="{{$data->nama_makanan_minuman}}" >
                    @error('nama_makanan_minuman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" value="{{$data->harga}}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok">Jumlah Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Jumlah Stok" value="{{$data->stok}}">
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection

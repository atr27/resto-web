@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <a href="{{route('daftar_makanan_minuman.create')}}" class="btn btn-primary mb-3">Tambah Makanan & Minuman</a>
        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_makanan_minuman }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <a href="{{ route('daftar_makanan_minuman.edit', $item->id_makanan_minuman) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('daftar_makanan_minuman.destroy', $item->id_makanan_minuman) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin untuk hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')

@endsection

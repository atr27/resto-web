@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('restoran.update', $resto->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama_restoran" class="form-label">Nama Restoran</label>
                    <input type="text" class="form-control @error('nama_restoran') is-invalid @enderror"
                        id="nama_restoran" name="nama_restoran" value="{{ $resto->nama_restoran }}">
                    @error('nama_restoran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ $resto->alamat }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No. Telp</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                        name="no_telp" value="{{ $resto->no_telp }}">
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik"
                        name="nama_pemilik" value="{{ $resto->nama_pemilik }}">
                    @error('nama_pemilik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection

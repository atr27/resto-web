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
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Items Makanan/Minuman</th>
                            <th>Total Harga</th>
                            <th>Tanggal Transaksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no_transaksi = 1  ?>
                        @foreach ($hasilTransaksi as $data)
                            <tr>
                                <td>{{$no_transaksi}}</td>
                                <td>{{$data->transaksi_code}}</td>
                                <td>
                                    <ol>
                                        @foreach ($data->items_makanan_minuman as $item)
                                            <li>{{$item->nama}}({{$item->quantity}})</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>Rp. {{number_format($data->total_harga)}}</td>
                                <td>{{$data->created_at->toDayDateTimeString()}}</td>
                                <td>
                                    <form action="{{route('transaksi.delete',$data->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php $no_transaksi++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection

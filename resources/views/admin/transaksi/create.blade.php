@extends('layouts.admin')

@section('style')

@endsection

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{route('transaksi.save')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="id_makanan_minuman">Daftar Transaksi Makanan Minuman</label>
                          <select class="form-control" id="id_makanan_minuman">
                            @foreach ($data as $item)
                                 <option value="{{$item->id_makanan_minuman}}" data-nama="{{$item->nama_makanan_minuman}}" data-harga="{{$item->harga}}" data-id="{{$item->id_makanan_minuman}}">{{$item->nama_makanan_minuman}} Rp. {{number_format($item->harga)}}</option>
                            @endforeach
                          </select>
                        </div>
                     </div>
                     <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah Transaksi</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="transaksiItem">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th class="quantity">0</th>
                                    <th class="totalHargaTransaksi">0</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="total_harga" value="0">
                        <button class="btn btn-warning">Simpan Transaksi</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('script')
   <script>
        var totalHargaTransaksi = 0;
        var quantity = 0;
        var listItem = [];

        function tambahItem() {
            updateTotalHarga(parseInt($('#id_makanan_minuman').find(':selected').data('harga')))
            var item = listItem.filter((el)=> el.id === $('#id_makanan_minuman').find(':selected').data('id'))
            if (item.length > 0) {
                item[0].quantity += 1
            } else {
                var item = {
                    id: $('#id_makanan_minuman').find(':selected').data('id'),
                    nama: $('#id_makanan_minuman').find(':selected').data('nama'),
                    harga: $('#id_makanan_minuman').find(':selected').data('harga'),
                    quantity: 1
                }
                listItem.push(item)
            }
            updateQuantityItem(1)
            updateTable()
        }

        function updateTotalHarga(nom){
            totalHargaTransaksi += nom;
            $('[name=total_harga]').val(totalHargaTransaksi)
            $('.totalHargaTransaksi').html(formatRupiah(totalHargaTransaksi.toString()))
        }

        function updateQuantityItem(nom) {
            quantity += nom;
            $('.quantity').html(formatRupiah(quantity.toString()))
        }

        function updateTable() {
            var html = '';
            listItem.map((el, index) => {
                var harga = formatRupiah(el.harga.toString());
                var quantity = formatRupiah(el.quantity.toString());
                html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${el.nama}</td>
                        <td>${quantity}</td>
                        <td>${harga}</td>
                        <td>
                            <input type="hidden" name="id_makanan_minuman[]" value="${el.id}">
                            <input type="hidden" name="quantity[]" value="${el.quantity}">
                            <button type="button" onclick="deleteItem(${index})" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                `
            })
            $('.transaksiItem').html(html)
        }

        function deleteItem(index) {
            var item = listItem[index];
            if (item.quantity > 1) {
                item.quantity[index] -= 1;
                updateTotalHarga(-(item.harga))
                updateQuantityItem(-1)
            } else {
                listItem.splice(index, 1)
                updateTotalHarga(-(item.harga*item.quantity))
                updateQuantityItem(-(item.quantity))
            }
            updateTable()
        }
   </script>
@endsection

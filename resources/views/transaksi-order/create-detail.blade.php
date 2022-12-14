@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Order
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi-order.index')}}">Order</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi-order.create') }}">Tambah Order</a>
        </li>
    </ul>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Order
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>{{ $order->no_dokumen_order }}</strong></h4>
                        <p class="control-label">Nama Customer : {{ $order->nama_customer }}</p>
                        <p class="control-label">Tanggal Order : {{ $order->tanggal_order }}</p>
                        <p class="control-label">No. PO : {{ $order->no_po_customer }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Penanggung Jawab</strong></h4>
                        <p class="control-label">Penanggung Jawab : {{ $order->nama_karyawan }}</p>
                        <p class="control-label">Status : {{ $order->status }}</p>
                        <p class="control-label">Total Harga : {{ $order->total_harga }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Tambah Detail Order
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('transaksi-order.save-detail') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Produk</label>
                            <select class="select2_category form-control" name="produk_id" id="produk_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($produk as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama_produk }} , {{ $d->kode_produk }} , {{ $d->warna }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Qty</label>
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Qty" value="0" required>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control" placeholder="harga" value="0" required>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Subtotal</label>
                            <input type="number" id="subtotal" name="subtotal" class="form-control" placeholder="Subtotal" value="0" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions right">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> List Detail Order
        </div>
    </div>
    <div class="portlet-body form">
        <table class="table" id="sample_1">
            <thead>
                <tr>
                <th>Kode Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($orderDetail as $d)
                <tr>
                <td>{{ $d->kode_produk }}</td>
                <td>{{ $d->qty }}</td>
                <td>Rp. {{ number_format($d->harga ,2,',','.') }}</td>
                <td>Rp. {{ number_format($d->subtotal ,2,',','.') }}</td>
                <td>
                    <ul class="nav nav-pills">
                        <li >
                            <button onclick="window.location='{{ route('transaksi-order.edit-detail', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
                        </li>
                        {{-- <li>
                            <form method="POST" action="{{route('transaksi-order.destroy' , $d->id)}}">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                                onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                            </form>
                        </li> --}}
                    </ul>
                </td>
                @php
                    $total += $d->subtotal;
                @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="portlet-body form">
    <!-- BEGIN FORM-->
    <form method="POST" action="" class="horizontal-form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-body">
            <h3 class="form-section">Total</h3>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Total</label>
                        <span class="form-control">Rp. {{ number_format($total ,2,',','.') }}</span>
                        <input type="hidden" id="total" name="total" class="form-control" placeholder="Total" value="{{ $total }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Bayar</label>
                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions right">
            <button type="button" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
        </div>
    </form>
    <!-- END FORM-->
</div>

@endsection

@section('scripts')
<script>
    jQuery(document).ready(function() {
        //plugin datatable
        $('#sample_1').DataTable();
    });

    $( "#qty" ).keyup(function() {
        let jumlah = $(this).val();
        let harga_beli = document.getElementById("harga").value;
        let total = parseInt(jumlah) * parseInt(harga_beli);
        let subtotal = document.getElementById("subtotal").value = total;

    });

    $( "#harga" ).keyup(function() {
        let harga_beli = $(this).val();
        let jumlah = document.getElementById("qty").value;
        let total = parseInt(jumlah) * parseInt(harga_beli);
        let subtotal = document.getElementById("subtotal").value = total;

    });
</script>
@stop

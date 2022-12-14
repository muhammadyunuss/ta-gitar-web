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
            <i class="fa fa-reorder"></i> Edit Detail Order
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('transaksi-order.update-detail', $data->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-body">
                <input type="hidden" name="order_id" id="order_id" value="{{ $data->order_id }}">
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Produk</label>
                            <select class="select2_category form-control" name="produk_id" id="produk_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($produk as $d)
                                    <option value="{{ $d->id }}" {{ old('produk_id', $d->id ) == $data->produk_id ? 'selected' : null }}>{{ $d->nama_produk }} , {{ $d->kode_produk }} , {{ $d->warna }}</option>
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
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Qty" value="{{ $data->qty }}" required>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control" placeholder="harga" value="{{ $data->harga }}" required>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Subtotal</label>
                            <input type="number" id="subtotal" name="subtotal" class="form-control" placeholder="Subtotal" value="{{ $data->subtotal }}" required>
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

@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Transaksi Order <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('transaksi-order.index')}}">Transaksi Order</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi-order.index')}}">Sediaan Transaksi Order</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi-order.create')}}">Tambah Sediaan Transaksi Order</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Transaksi Order
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('transaksi-order.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="customer_id">Customer</label>
						<select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror">
                            <option value="">Pilih Customer</option>
                            @foreach($customer as $d)
                                <option value="{{ $d->id }}" {{ old('customer_id', $d->id ) == $data->customer_id ? 'selected' : null }}>{{ $d->nama_customer }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
					</div>
                    <div class="form-group">
						<label for="no_po_customer">No. PO Customer</label>
						<input type="text" class="form-control @error('no_po_customer') is-invalid @enderror" name="no_po_customer" value="{{ old('no_po_customer', $data->no_po_customer) }}" placeholder="Isikan nama bahan baku Anda" required>
						@error('no_po_customer')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
                    <div class="form-group">
                        <label for="tanggal_order">Tanggal Order</label>
                        <div>
                            <input type="date" id="tanggal_order" name="tanggal_order" class="form-control @error('tanggal_order') is-invalid @enderror" placeholder="dd-mm-yyyy" value="{{ old('tanggal_order', date('Y-m-d', $data->tanggal_order==null ? null : strtotime($data->tanggal_order)))}}">
                        </div>
                    </div>
                    <div class="form-group">
						<label for="karyawan_id">Karyawan</label>
						<select name="karyawan_id" id="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror">
                            <option value="">Pilih Karyawan</option>
                            @foreach($karyawan as $d)
                                <option value="{{ $d->id }}" {{ old('karyawan_id', $d->id ) == $data->karyawan_id ? 'selected' : null }}>{{ $d->nama_karyawan }}</option>
                            @endforeach
                        </select>
                        @error('modelproduk_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script type="text/javascript">
$(document).ready(function() {
    // $('#supplier_id').select2();
});
</script>
@stop

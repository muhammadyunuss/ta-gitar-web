@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Produk Gitar
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('produk-gitar.index')}}">Produk Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('produk-gitar.index')}}">Sediaan Produk Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('produk-gitar.create')}}">Tambah Sediaan Produk Gitar</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Produk Gitar
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('produk-gitar.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="kode_produk">Kode Produk</label>
						<input type="text" class="form-control @error('kode_produk') is-invalid @enderror" name="kode_produk" value="{{ old('kode_produk') }}" placeholder="Isikan" required>
						@error('kode_produk')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
						<label for="nama_modelproduk">Model Produk</label>
						<select name="modelproduk_id" id="modelproduk_id" class="form-control @error('modelproduk_id') is-invalid @enderror">
                            <option value="">Pilih Jenis Model</option>
                            @foreach($modelProduk as $d)
                                <option value="{{ $d->id }}">{{ $d->nama_modelproduk }}</option>
                            @endforeach
                        </select>
                        @error('modelproduk_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
						<label for="nama_produk">Nama Produk</label>
						<input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Nama Produk" required>
						@error('nama_produk')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="warna">Warna</label>
						<input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}" placeholder="Warna" required>
						@error('warna')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" value="{{ old('harga_jual') }}" placeholder="Harga Jual" required>
                        @error('harga_jual')
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

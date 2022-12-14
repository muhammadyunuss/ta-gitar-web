@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Transaksi Bill Of Material <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('bill-of-material.index')}}">Transaksi Bill Of Material</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bill-of-material.index')}}">Sediaan Transaksi Bill Of Material</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bill-of-material.create')}}">Tambah Sediaan Transaksi Bill Of Material</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Transaksi Bill Of Material
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('bill-of-material.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="produk_id">Produk</label>
						<select name="produk_id" id="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                            <option value="">Pilih Produk</option>
                            @foreach($produk as $d)
                                <option value="{{ $d->id }}">{{ $d->nama_produk }}</option>
                            @endforeach
                        </select>
                        @error('produk_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
					</div>
                    <div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Isikan nama bahan baku Anda" required>
						@error('deskripsi')
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

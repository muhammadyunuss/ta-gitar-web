@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Bahan Baku <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('material.index')}}">Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('material.index')}}">Sediaan Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('material.create')}}">Tambah Sediaan Bahan Baku</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Bahan Baku
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('material.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="nama_bahanbaku">Nama Bahan Baku</label>
						<input type="text" class="form-control @error('nama_bahanbaku') is-invalid @enderror" name="nama_bahanbaku" value="{{ old('nama_bahanbaku') }}" placeholder="Isikan nama bahan baku Anda" required>
						@error('nama_bahanbaku')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="qty">Qty</label>
						<input type="number" step="any" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}"  placeholder="Isikan qty bahan baku Anda" min="0" required>
						@error('qty')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <div class="form-group">
						<label for="satuan">Satuan</label>
						<input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{ old('satuan') }}" placeholder="Isikan satuan bahan baku Anda" required>
						@error('satuan')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
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

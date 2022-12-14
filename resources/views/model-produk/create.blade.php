@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Model Gitar <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('model-produk.index')}}">Model Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('model-produk.index')}}">Sediaan Model Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('model-produk.create')}}">Tambah Sediaan Model Gitar</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Model Gitar
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('model-produk.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="nama_modelproduk">Nama Model Gitar</label>
						<input type="text" class="form-control @error('nama_modelproduk') is-invalid @enderror" name="nama_modelproduk" value="{{ old('nama_modelproduk') }}" placeholder="Isikan nama bahan baku Anda" required>
						@error('nama_modelproduk')
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

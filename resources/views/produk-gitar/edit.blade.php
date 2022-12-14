@extends('layouts.layout')


@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Produk Gitar <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('produk-gitar.index')}}">Produk Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('produk-gitar.index')}}">Sediaan Produk Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <!-- <li>
            <a href="{{route('produk-gitar.index')}}">Produk Gitar</a>
            <i class="fa fa-angle-right"></i>
        </li> -->
        <li>
            <a href="{{route('produk-gitar.edit', $data->id)}}">Ubah Produk Gitar</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>   -->
<div >
<div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Ubah Sediaan Produk Gitar
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('produk-gitar.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-body">
                <div class="form-group">
                    <label for="nama_modelproduk">Nama Produk Gitar</label>
                    <input type="text" class="form-control @error('nama_modelproduk') is-invalid @enderror" name="nama_modelproduk" value="{{ old('nama_modelproduk', $data->nama_modelproduk) }}" placeholder="Isikan nama bahan baku Anda" required>
                    @error('nama_modelproduk')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
            </form>
        </div>
    </div>
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

@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Surat Perintah Kerja <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('surat-perintah-kerja.index')}}">Surat Perintah Kerja</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('surat-perintah-kerja.index')}}">Sediaan Surat Perintah Kerja</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('surat-perintah-kerja.create')}}">Tambah Sediaan Surat Perintah Kerja</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Surat Perintah Kerja
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('surat-perintah-kerja.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="order_id">Order</label>
						<select name="order_id" id="order_id" class="form-control @error('order_id') is-invalid @enderror">
                            <option value="">Pilih Order</option>
                            @foreach($order as $d)
                                <option value="{{ $d->id }}">{{ $d->nama_customer }} | {{ $d->no_dokumen_order  }}</option>
                            @endforeach
                        </select>
                        @error('order_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
					</div>
                    <div class="form-group">
                        <label for="tanggal_spk">Tanggal SPK</label>
                        <div>
                            <input type="date" id="tanggal_spk" name="tanggal_spk" class="form-control @error('tanggal_spk') is-invalid @enderror" placeholder="dd-mm-yyyy" value="{{ old('tanggal_spk')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Estimasi</label>
                        <div>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" placeholder="dd-mm-yyyy" value="{{ old('tanggal_selesai')}}">
                        </div>
                    </div>
                    <div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="0">Open SPK</option>
                            <option value="1">Progres Produksi</option>
                            <option value="2">Finish</option>
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

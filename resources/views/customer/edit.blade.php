@extends('layouts.layout')


@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Customer <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('customer.index')}}">Customer</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('customer.index')}}">Sediaan Customer</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <!-- <li>
            <a href="{{route('customer.index')}}">Customer</a>
            <i class="fa fa-angle-right"></i>
        </li> -->
        <li>
            <a href="{{route('customer.edit', $data->id)}}">Ubah Customer</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>   -->
<div >
<div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Ubah Sediaan Customer
            </div>
        </div>
        <div class="portlet-body form">
            <form method="POST" action="{{ route('customer.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-body">
                <div class="form-body">
                    <div class="form-group">
						<label for="nama_customer">Nama Customer</label>
						<input type="text" class="form-control @error('nama_customer') is-invalid @enderror" name="nama_customer" value="{{ old('nama_customer', $data->nama_customer) }}" placeholder="Nama Customer" required>
						@error('nama_customer')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $data->email) }}" placeholder="Email" required>
						@error('email')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="no_telepon">No. Telepon</label>
						<input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon', $data->no_telepon) }}" placeholder="No. Telepon" required>
						@error('no_telepon')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
				</div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $data->alamat) }}" placeholder="Alamat" required>
                        @error('alamat')
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

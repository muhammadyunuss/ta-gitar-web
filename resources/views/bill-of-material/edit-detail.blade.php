@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Bill Of Material
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bill-of-material.index')}}">Bill Of Material</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('bill-of-material.create') }}">Tambah Bill Of Material</a>
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
            <i class="fa fa-reorder"></i> Bill Of Material
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>BOM</strong></h4>
                        <p class="control-label">Produk : {{ $billofmaterial->nama_produk }}</p>
                        <p class="control-label">Deskripsi : {{ $billofmaterial->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Edit Detail Bill Of Material
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('bill-of-material.update-detail', $billofmaterialDetail->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-body">
                <input type="hidden" name="billofmaterial_id" id="billofmaterial_id" value="{{ $billofmaterialDetail->billofmaterial_id }}">
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Produk</label>
                            <select class="select2_category form-control" name="bahanbaku_id" id="bahanbaku_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($bahanbaku as $d)
                                    <option value="{{ $d->id }}" {{ old('bahanbaku_id', $d->id ) == $billofmaterialDetail->bahanbaku_id ? 'selected' : null }}>{{ $d->nama_bahanbaku }}</option>
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
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Qty" value="{{ $billofmaterialDetail->qty }}" required>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Satuan</label>
                            <input type="text" id="satuan" name="satuan" class="form-control" placeholder="satuan" value="{{ $billofmaterialDetail->satuan }}" required>
                        </div>
                    </div>
                    <!--/span-->
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

    $("#bahanbaku_id").on('change', function(event) {
        let id = $(this).val();
        // document.getElementById("ongkos_jahit").value = 0;
        if(id){
            $.ajax ({
                type: 'GET',
                url: "{{ url('/produksi/bill-of-material/get-ajax-bahan-baku') }}"+"/"+id,
                dataType: 'json',
                success : function(data) {
                    document.getElementById("qty").value = data[0].qty;
                    document.getElementById("satuan").value = data[0].satuan;
                }
            });
        }
    });
</script>
@stop

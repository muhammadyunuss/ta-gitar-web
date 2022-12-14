@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Bill Of Material &nbsp;&nbsp;
    <a type= "button" href="{{route('bill-of-material.create')}}" class="btn btn-primary btn-sm">
        + Tambah Bill Of Material
    </a>
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
            <a href="{{route('bill-of-material.index')}}">Sediaan Bill Of Material</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

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

<table class="table" id="sample_1">
<thead>
    <tr>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->kode_produk }}</td>
    <td>{{ $d->nama_produk }}</td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('bill-of-material.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li >
                <button onclick="window.location='{{ route('bill-of-material.create-detail', $d->id) }}'" type="button" class="btn btn-primary">Detail</button>
            </li>
            <li>
                <form method="POST" action="{{route('bill-of-material.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                </form>
            </li>
        </ul>
    </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script>
jQuery(document).ready(function() {
	//plugin datatable
	$('#sample_1').DataTable();
});

//   $(function () {
//     var table = $('#sample_1').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('bill-of-material.index') }}",
//         columns: [
//             {data: 'nama_material', name: 'nama_material'},
//             {data: 'qty', name: 'qty'},
//             {data: 'satuan', name: 'satuan'},
//             {data: 'action', name: 'action', orderable: false, searchable: false},
//         ]
//     });
//   });
</script>
@stop

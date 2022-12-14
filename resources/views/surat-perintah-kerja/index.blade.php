@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Surat Perintah Kerja &nbsp;&nbsp;
    <a type= "button" href="{{route('surat-perintah-kerja.create')}}" class="btn btn-primary btn-sm">
        + Tambah Surat Perintah Kerja
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
            <a href="{{route('surat-perintah-kerja.index')}}">Surat Perintah Kerja</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('surat-perintah-kerja.index')}}">Sediaan Surat Perintah Kerja</a>
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

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table" id="sample_1">
<thead>
    <tr>
    <th>No SPK</th>
    <th>No Dokumen Order</th>
    <th>Nama Customer</th>
    <th>Tanggal</th>
    <th>Estimasi</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->no_dokumen_spk }}</td>
    <td>{{ $d->no_dokumen_order }}</td>
    <td>{{ $d->nama_customer }}</td>
    <td>{{ $d->tanggal_spk }}</td>
    <td>{{ $d->tanggal_selesai }}</td>
    <td>{{ $d->status }}</td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('surat-perintah-kerja.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            {{-- <li >
                <button onclick="window.location='{{ route('surat-perintah-kerja.create-detail', $d->id) }}'" type="button" class="btn btn-primary">Detail</button>
            </li> --}}
            <li>
                <form method="POST" action="{{route('surat-perintah-kerja.destroy' , $d->id)}}">
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
//         ajax: "{{ route('surat-perintah-kerja.index') }}",
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

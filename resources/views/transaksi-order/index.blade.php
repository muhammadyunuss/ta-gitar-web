@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Transaksi Order &nbsp;&nbsp;
    <a type= "button" href="{{route('transaksi-order.create')}}" class="btn btn-primary btn-sm">
        + Tambah Transaksi Order
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
            <a href="{{route('transaksi-order.index')}}">Transaksi Order</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi-order.index')}}">Sediaan Transaksi Order</a>
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
    <!-- <th>ID</th> -->
    <th>No Dokumen Order</th>
    <th>Nama Customer</th>
    <th>Tanggal Order</th>
    <th>No. PO Customer</th>
    <th>Penanggung Jawab</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->no_dokumen_order }}</td>
    <td>{{ $d->nama_customer }}</td>
    <td>{{ $d->tanggal_order }}</td>
    <td>{{ $d->no_po_customer }}</td>
    <td>{{ $d->nama_karyawan }}</td>
    <td>Rp. {{ number_format($d->total_harga ,2,',','.') }}</td>
    <td>{{ $d->status }}</td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('transaksi-order.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li >
                <button onclick="window.location='{{ route('transaksi-order.create-detail', $d->id) }}'" type="button" class="btn btn-primary">Detail</button>
            </li>
            <li>
                <form method="POST" action="{{route('transaksi-order.destroy' , $d->id)}}">
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
//         ajax: "{{ route('transaksi-order.index') }}",
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

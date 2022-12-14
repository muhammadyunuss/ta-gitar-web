<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::join('customer', 'order.customer_id', 'customer.id')
        ->join('karyawan', 'order.karyawan_id', 'karyawan.id')
        ->select(
            'order.*',
            'customer.nama_customer',
            'karyawan.nama_karyawan'
        )
        ->get();
        return view('transaksi-order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::get();
        $karyawan = Karyawan::get();
        return view('transaksi-order.create', compact('customer', 'karyawan'));
    }

    public function createDetail($id)
    {
        $order = Order::join('customer', 'order.customer_id', 'customer.id')
        ->join('karyawan', 'order.karyawan_id', 'karyawan.id')
        ->where('order.id', $id)
        ->select(
            'order.*',
            'customer.nama_customer',
            'karyawan.nama_karyawan'
        )
        ->first();


        $orderDetail = OrderDetail::join('produk', 'order_detail.produk_id', 'produk.id')
        ->where('order_detail.order_id', $id)
        ->select(
            'order_detail.*',
            'produk.nama_produk',
            'produk.kode_produk',
            'produk.warna'
        )
        ->get();

        $produk = Produk::join('model_produk', 'produk.modelproduk_id', 'model_produk.id')
        ->select(
            'produk.*',
            'model_produk.nama_modelproduk'
        )
        ->get();

        return view('transaksi-order.create-detail', compact('order', 'orderDetail', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $data['total_harga'] = 0;
        $data['status'] = 0;
        Order::create($data);
        return redirect()->route('transaksi-order.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function storeDetail(Request $request)
    {
        OrderDetail::create($request->all());
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Order::find($id);
        $order = Order::join('customer', 'order.customer_id', 'customer.id')
        ->join('karyawan', 'order.karyawan_id', 'karyawan.id')
        ->where('order.id', $data->order_detail)
        ->select(
            'order.*',
            'customer.nama_customer',
            'karyawan.nama_karyawan'
        )
        ->first();
        $produk = Produk::get();
        return view('transaksi-order.edit-detail', compact('data', 'produk'));
    }

    public function editDetail($id)
    {
        $data = OrderDetail::find($id);
        $order = Order::where('id', $data->order_id)->first();
        $produk = Produk::get();
        $karyawan = Karyawan::get();
        return view('transaksi-order.edit-detail', compact('data', 'produk', 'karyawan', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::where('id', $id)->update(request()->except(['_token','_method']));
        return redirect()->route('transaksi-order.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function updateDetail(Request $request, $id)
    {
        OrderDetail::where('id', $id)->update(request()->except(['_token','_method', 'order_id']));
        return redirect()->route('transaksi-order.create-detail', $request->order_id)->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        OrderDetail::find('order_detail', $id)->delete();
        return redirect()->route('transaksi-order.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

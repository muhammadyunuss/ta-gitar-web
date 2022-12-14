<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SuratPerintahKerja;
use Illuminate\Http\Request;

class SuratPerintahKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratPerintahKerja::join('order', 'surat_perintah_kerja.order_id', 'order.id')
        ->join('customer', 'order.customer_id', 'customer.id')
        ->select(
            'surat_perintah_kerja.*',
            'order.no_dokumen_order',
            'customer.nama_customer'
        )
        ->get();

        return view('surat-perintah-kerja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::join('customer', 'order.customer_id', 'customer.id')
        ->select(
            'order.*',
            'customer.nama_customer'
        )
        ->get();
        return view('surat-perintah-kerja.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SuratPerintahKerja::create($request->all());
        return redirect()->route('surat-perintah-kerja.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SuratPerintahKerja::find($id);
        $order = Order::join('customer', 'order.customer_id', 'customer.id')
        ->select(
            'order.*',
            'customer.nama_customer'
        )
        ->get();
        return view('surat-perintah-kerja.edit',compact('data', 'order'));
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
        $data = SuratPerintahKerja::find($id);
        $data->update($request->all());

        return redirect()->route('surat-perintah-kerja.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SuratPerintahKerja::find($id);
        $data->delete();

        return redirect()->route('surat-perintah-kerja.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\BillOfMaterial;
use App\Models\BillOfMaterialDetail;
use App\Models\Produk;
use Illuminate\Http\Request;

class BillOfMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BillOfMaterial::join('produk', 'billofmaterial.produk_id', 'produk.id')
        ->select(
            'billofmaterial.*',
            'produk.nama_produk',
            'produk.kode_produk',
        )
        ->get();
        return view('bill-of-material.index', compact('data'));
    }

    function getAjaxBahanBaku($id){
        $bahanbaku = BahanBaku::where('id', $id)->get();
        return response()->json($bahanbaku);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::get();
        return view('bill-of-material.create', compact('produk'));
    }

    public function createDetail($id)
    {
        $billofmaterial = BillOfMaterial::join('produk', 'billofmaterial.produk_id', 'produk.id')
        ->where('billofmaterial.id', $id)
        ->select(
            'billofmaterial.*',
            'produk.nama_produk',
            'produk.kode_produk',
        )
        ->first();

        $billofmaterialDetail = BillOfMaterialDetail::join('bahan_baku', 'billofmaterial_detail.bahanbaku_id', 'bahan_baku.id')
        ->where('billofmaterial_detail.billofmaterial_id', $id)
        ->select(
            'billofmaterial_detail.*',
            'bahan_baku.nama_bahanbaku',
        )
        ->get();

        $bahanbaku = BahanBaku::get();

        return view('bill-of-material.create-detail', compact('billofmaterial', 'billofmaterialDetail', 'bahanbaku'));
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
        $billofmaterial = BillOfMaterial::create($data);
        return redirect()->route('bill-of-material.create-detail', $billofmaterial->id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function storeDetail(Request $request)
    {
        BillOfMaterialDetail::create($request->all());
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
        $data = BillOfMaterial::find($id);
        $order = BillOfMaterial::join('customer', 'order.customer_id', 'customer.id')
        ->join('karyawan', 'order.karyawan_id', 'karyawan.id')
        ->where('order.id', $data->order_detail)
        ->select(
            'order.*',
            'customer.nama_customer',
            'karyawan.nama_karyawan'
        )
        ->first();
        $produk = Produk::get();
        return view('bill-of-material.edit-detail', compact('data', 'produk'));
    }

    public function editDetail($id)
    {
        $billofmaterialDetail = BillOfMaterialDetail::join('bahan_baku', 'billofmaterial_detail.bahanbaku_id', 'bahan_baku.id')
        ->select(
            'billofmaterial_detail.*',
            'bahan_baku.nama_bahanbaku',
            'bahan_baku.satuan'
        )
        ->find($id);

        $billofmaterial = BillOfMaterial::join('produk', 'billofmaterial.produk_id', 'produk.id')
        ->where('billofmaterial.id', $id)
        ->select(
            'billofmaterial.*',
            'produk.nama_produk',
            'produk.kode_produk'
        )
        ->first();

        $bahanbaku = BahanBaku::get();

        return view('bill-of-material.edit-detail', compact('billofmaterialDetail', 'bahanbaku', 'billofmaterial'));
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
        BillOfMaterial::where('id', $id)->update(request()->except(['_token','_method']));
        return redirect()->route('bill-of-material.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function updateDetail(Request $request, $id)
    {
        BillOfMaterialDetail::where('id', $id)->update(request()->except(['_token','_method', 'billofmaterial_id', 'satuan']));
        return redirect()->route('bill-of-material.create-detail', $request->billofmaterial_id)->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BillOfMaterial::find($id)->delete();
        BillOfMaterialDetail::find('order_detail', $id)->delete();
        return redirect()->route('bill-of-material.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

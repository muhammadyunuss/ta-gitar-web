<?php

namespace App\Http\Controllers;

use App\Models\ModelProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukGitarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::join('model_produk', 'produk.modelproduk_id', 'model_produk.id')
        ->select(
            'produk.*',
            'model_produk.nama_modelproduk'
        )
        ->get();
        return view('produk-gitar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelProduk = ModelProduk::get();
        return view('produk-gitar.create', compact('modelProduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Produk::create($request->all());
        return redirect()->route('produk-gitar.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data = Produk::find($id);
        return view('produk-gitar.edit',compact('data'));
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
        $data = Produk::find($id);
        $data->update($request->all());

        return redirect()->route('produk-gitar.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();

        return redirect()->route('produk-gitar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

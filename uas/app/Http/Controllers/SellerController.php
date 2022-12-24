<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function setPublished($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->published = !$penjualan->published;
        $penjualan->save();

        return Redirect::back();
    }

    public function adminProdukView()
    {
        $penjualans = Penjualan::all();

        return view('admin.produk', [
            'title' => 'Produk',
            'penjualans' => $penjualans,
        ]);
    }

    public function catalogView()
    {
        $penjualans = Penjualan::where('published', 1)->get();

        return view('home.catalog', [
            'title' => 'Katalog',
            'penjualans' => $penjualans,
        ]);
    }

    public function penjualanView()
    {
        $user = Auth::user();
        $penjualans = Penjualan::where('id_seller', $user->id)->get();

        return view('user.penjualan', [
            'title' => 'Penjualan',
            'penjualans' => $penjualans,
        ]);
    }

    public function addPenjualanView()
    {
        return view('user.addPenjualan', [
            'title' => 'Tambah Penjualan',
        ]);
    }

    public function addPenjualan(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // upload foto
        $file = $req->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = public_path('img\\');
        $file->move($tujuan_upload, $nama_file);

        $user = Auth::user();
        $penjualan = new Penjualan();
        $penjualan->id_seller = $user->id;
        $penjualan->nama = $req->nama;
        $penjualan->harga = $req->harga;
        $penjualan->deskripsi = $req->deskripsi;
        $penjualan->foto = $nama_file;
        $penjualan->published = 1;
        $penjualan->penjualan = 0;
        $penjualan->save();

        return Redirect::to('/seller/penjualan')->with('success', 'Produk berhasil ditambahkan');
    }

    public function deleteProduct($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();

        return Redirect::to('/seller/penjualan')->with('success', 'Produk berhasil dihapus');
    }

    public function detailProduct($id)
    {
        $produk = Penjualan::find($id);

        return view('home.detailProduct', [
            'title' => 'Detail Produk',
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function insertproduk(Request $request)
    {
        $file = $request->file('gambar_produk'); // Retrieve the uploaded file from the request
        $filename = $file->getClientOriginalName();

        Storage::putFileAs('public/images', $file, $filename);
        $produk = new Produk();
        $produk->nama_produk = $request->input('nama_produk');
        $produk->id_kategori = $request->input('id_kategori');
        $produk->harga_produk = $request->input('harga_produk');
        $produk->gambar_produk = $filename;
        $produk->updater_id = $request->session()->get('token');
        $produk->save();
        return redirect('/admin/produk/view');
    }

    public function getProduks()
    {
        $produk = Produk::with('kategoris')->get();
        $kategori = Kategori::get();
        return view('admin.produk_admin', ['produks'=>$produk, 'kategoris'=>$kategori]);
    }

    public function getProdukView()
    {
        $makanan = Produk::where('id_kategori','2')->get();
        $minuman = Produk::where('id_kategori','3')->get();
        $kategori = Kategori::get();
        return view('user.menu', ['makanan'=>$makanan, 'minuman'=>$minuman]);
    }

    public function getOneProduks($id)
    {
        $produk = Produk::find($id);
        return view('admin.produk_admin', ['produks' =>$produk]);
    }

    public function deleteProduk($id){
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/admin/produk/view');
    }

    

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        $produk->harga_produk = $request->input('harga_produk');
        $produk->updater_id = $request->session()->get('token');
        $produk->save();

        return redirect('/admin/produk/view');
    }


}

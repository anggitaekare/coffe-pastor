<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function insertKategori(Request $request)
    {
        $kategori = new kategori();
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->updater_id = $request->session()->get('token');
        $kategori->save();
        return redirect('/admin/kategori/view');
    }

    public function getKategoris()
    {
        $kategori = Kategori::all();
        return view('admin.kategori_admin', ['kategoris'=>$kategori]);
    }

    public function deleteKategori($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/admin/kategori/view');
    }
}

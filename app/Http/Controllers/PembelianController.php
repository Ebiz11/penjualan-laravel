<?php

namespace App\Http\Controllers;
use App\Pembelian
use Illuminate\Http\Request;

use App\Http\Requests;

class PembelianController extends Controller
{

  public function store(Request $request)
  {
      $this->validate($request, [
        'total' => 'required',
        'stok' => 'required'
      ]);

      $tambah = new Pembelian();
      $tambah->id_barang = $id_barang;
      $tambah->id_transaksi = 1;
      $tambah->id_supplier = 1;
      $tambah->jumlah = 0;
      $tambah->sub_total = $request['total'];
      $save = $tambah->save();
  }

  // public function stok(Request $request)
  // {
  //    $update = Barang::where('id_barang', $request['id_barangStok'])->first();
  //    $update->nama_barang = $request['nama_barangEdit'];
  //    $update->harga_jual = $request['harga_jualEdit'];
  //    $update->stok = $request['stokEdit'];
  //    $msg = $update->update();
  //    return redirect()->to('/barang');
  // }
}

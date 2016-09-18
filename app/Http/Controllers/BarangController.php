<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Barang;
use Datatables;
use App\Http\Requests;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nama_barang' => 'required',
          'harga_jual' => 'required',
          'stok' => 'required'
        ]);

        $tambah = new Barang();
        $tambah->nama_barang = $request['nama_barang'];
        $tambah->harga_jual = $request['harga_jual'];
        $tambah->stok = $request['stok'];
        $save = $tambah->save();

        // return redirect()->to('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request['id'];
        $show = Barang::where('id_barang', $id)->first();
        echo json_encode($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tampiledit = Barang::where('id_barang', $id)->first();
      return view('barang.edit')->with('tampiledit', $tampiledit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $update = Barang::where('id_barang', $request['id_barangEdit'])->first();
       $update->nama_barang = $request['nama_barangEdit'];
       $update->harga_jual = $request['harga_jualEdit'];
       $update->stok = $request['stokEdit'];
       $msg = $update->update();
       return redirect()->to('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $hapus = Barang::find($request['id']);
      $hapus->delete();

      return redirect()->to('/');
    }

    public function getBarang(){
      $barang = Barang::orderBy('id_barang', 'DESC')->get();

      return Datatables::of($barang)->addColumn('action', function ($barang) {
          return '
            <a href="javascript:void(0)" onclick="stok('."'".$barang->id_barang."'".')" class="btn btn-xs btn-info"><i class="fa fa-flash (alias)"></i> Stok</a>
            <a href="javascript:void(0)" onclick="editBarang('."'".$barang->id_barang."'".')" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></a>
            <a href="javascript:void(0)" onclick="destroy('."'".$barang->id_barang."'".')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>';
      })->make(true);
    }
}

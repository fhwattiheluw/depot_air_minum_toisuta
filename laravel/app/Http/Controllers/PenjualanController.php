<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Penjualan;
use App\Models\Kostumer;
use App\Models\detail_penjualan;

class PenjualanController extends Controller
{
  public function index()
  {
    $data = array('kostumers' => Kostumer::all() );
    return view('form_penjualan',$data);
  }

  public function insert(Request $request)
  {
    // validate
    $validated = $request->validate([
      'tipe_penjualan' => 'required',
      'tanggal' => 'required',
      'harga_satuan' => 'required' ,
      'pembayaran' => 'required',
      'jumlah' => 'required',
      'kostumer' => 'required'
    ]);
    //
    // print_r($validated);
    // die();

    // insert data penjualan
    Penjualan::create([
      'tanggal' => $validated['tanggal'],
      'total_penjualan' => (int)$validated['harga_satuan'] * (int)$validated['jumlah'],
    ]);

    // get id penjualan
    $id_penjualan = Penjualan::max('id');

    // insert data detail penjualan
    detail_penjualan::create([
      'tipe_penjualan' => $validated['tipe_penjualan'],
      'harga_satuan' => $validated['harga_satuan'],
      'jumlah' => $validated['jumlah'],
      'pembayaran' => $validated['pembayaran'],
      'id_kostumer' => $validated['kostumer'],
      'id_penjualan' => $id_penjualan,

    ]);

    // redirect with session
    return redirect(Route('penjualan.input'))->with('success','data penjualan berhasil di simpan');

  }
}

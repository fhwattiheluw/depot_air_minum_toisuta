<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Penjualan;
use App\Models\Kostumer;

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
          'tanggal' => 'required'
      ]);
      //data insert
      if ($request->tipe_penjualan == 'beli di tempat') {
        $data = array(
          'tanggal' => $request->input('tanggal'),
          'tempat' => (int)$request->input('jumlah'),
          'harga_satuan' => (int)$request->input('harga_satuan'),
          'total_harga' => (int)$request->input('harga_satuan') * (int)$request->input('jumlah'),
          'pembayaran' => $request->input('pembayaran'),
          'id_kostumer' => $request->input('kostumer'),
        );
      }elseif ($request->tipe_penjualan == 'antar motor') {
        $data = array(
          'tanggal' => $request->input('tanggal'),
          'motor' => (int)$request->input('jumlah'),
          'harga_satuan' => (int)$request->input('harga_satuan'),
          'total_harga' => (int)$request->input('harga_satuan') * (int)$request->input('jumlah'),
          'pembayaran' => $request->input('pembayaran'),
          'id_kostumer' => $request->input('kostumer'),
        );
      }elseif ($request->tipe_penjualan == 'antar mobil') {
        $data = array(
          'tanggal' => $request->input('tanggal'),
          'mobil' => (int)$request->input('jumlah'),
          'harga_satuan' => (int)$request->input('harga_satuan'),
          'total_harga' => (int)$request->input('harga_satuan') * (int)$request->input('jumlah'),
          'pembayaran' => $request->input('pembayaran'),
          'id_kostumer' => $request->input('kostumer'),
        );
      }

      print_r($data);
      // die();

      // model insert
      $model_penjualan = Penjualan::create($data); // modal create

      // redirect with session
      return redirect(Route('penjualan.input'))->with('success','data penjualan berhasil di simpan');

    }
}

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
          'tipe_penjualan' => 'required'
      ]);
      if ($request->tipe_penjualan == 'beli di tempat') {
        $validated = $request->validate([
            'harga_satuan' => 'required|numeric',
            'pembayaran' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        //data insert
        $data = array(
          'tanggal' => date('Y-m-d'),
          'tipe_penjualan' => $request->input('tipe_penjualan'),
          'harga_satuan' => $request->input('harga_satuan'),
          'jumlah' => $request->input('jumlah'),
          'total_harga' => (int)$request->input('harga_satuan') * (int)$request->input('jumlah'),
          'pembayaran' => $request->input('pembayaran'),
        );
      } else {
        $validated = $request->validate([
          'kostumer' => 'required',
            'harga_satuan' => 'required|numeric',
            'pembayaran' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        //data insert
        $data = array(
          'tanggal' => date('Y-m-d'),
          'tipe_penjualan' => $request->input('tipe_penjualan'),
          'harga_satuan' => $request->input('harga_satuan'),
          'jumlah' => $request->input('jumlah'),
          'total_harga' => (int)$request->input('harga_satuan') * (int)$request->input('jumlah'),
          'pembayaran' => $request->input('pembayaran'),
          'id_kostumer' => $request->input('kostumer'),
        );
      }

      // model insert

      $model_penjualan = Penjualan::create($data); // modal create

      // redirect with session
      return redirect(Route('penjualan.input'))->with('success','data penjualan berhasil di simpan');

    }
}

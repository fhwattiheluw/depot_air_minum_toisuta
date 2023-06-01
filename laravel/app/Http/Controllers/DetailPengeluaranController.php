<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\item_pengeluaran;
use App\Models\detail_pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailPengeluaranController extends Controller
{
    //
    public function index()
    {
        return "halooo index detail pengeluaran";
    }

    public function form()
    {
        $jenis_pengeluaran = item_pengeluaran::all();
        return view('form_pengeluaran', ['jenis'=>$jenis_pengeluaran])->with('status', 'Berhasil tambah Pengeluaran!');
    }

    public function store(Request $request)
    {
      // validate
        $image = $request->file('nota');
        $validatedData = $request->validate([
            'item_pengeluaran' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'keterangan'=> 'required|max:200',
            'tanggal'=> 'required|date',
            'nota' => 'required|image|mimes:jpeg,jpg,png',
        ]);

// upload image
        if ($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $validatedData['nota'] = $image_name;
        }

        // create new transaksi pengeluaran
        Pengeluaran::create([
          'tanggal' => $request->input('tanggal'),
         'total_transaksi' => (int)$request->input('jumlah') * (int)$request->input('harga_satuan'),
        ]);

        // find new transaksi
        $id_transaksi = Pengeluaran::max('id');

// create new detail pengeluaran
        detail_pengeluaran::create([
          'jumlah' => $validatedData['jumlah'],
          'harga_satuan' => $validatedData['harga_satuan'],
          'keterangan' => $validatedData['keterangan'],
          'nota' => $validatedData['nota'],
          'id_item' => $validatedData['item_pengeluaran'],
          'id_pengeluaran' => $id_transaksi,
        ]);

        return redirect(Route('detail_pengeluaran.form'))->with('success','Berhasil Input Data Detail Pengeluaran!');
    }
}

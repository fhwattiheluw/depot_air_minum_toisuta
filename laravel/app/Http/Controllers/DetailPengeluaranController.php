<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\detail_pengeluaran;

class DetailPengeluaranController extends Controller
{
    //
    public function index()
    {
        return "halooo index detail pengeluaran";
    }
    public function form()
    {
        $jenis_pengeluaran = Pengeluaran::all();
        return view('form_pengeluaran', ['jenis'=>$jenis_pengeluaran])->with('status', 'Berhasil tambah Pengeluaran!');
    }

    public function store(Request $request)
    {
        $image = $request->file('nota');
        $validatedData = $request->validate([
            'id_pengeluaran' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'keterangan'=> 'required|max:200',
            'tanggal'=> 'required|date',
            'nota' => 'image|mimes:jpeg,jpg,png',
        ]);
        if ($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $validatedData['nota'] = $image_name;            
        }
        
        detail_pengeluaran::create($validatedData);

        return redirect(Route('detail_pengeluaran.form'))->with('success','Berhasil Input Data Detail Pengeluaran!');
    }
}

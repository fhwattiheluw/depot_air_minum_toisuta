<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PeminjamanGalon;
use App\Models\Kostumer;


class PeminjamanGalonController extends Controller
{
  public function form()
  {
    $data['peminjaman'] = PeminjamanGalon::paginate(20);
    $data['kostumer'] = Kostumer::all();
    return view('form_pinjaman_galon',$data);
  }

  public function insert(Request $request)
  {
    // validate data input
    $validated = $request->validate([
      'kostumer' => 'required',
      'jumlah' => 'required|numeric',
      'tanggal' => 'required',
    ]);

    // model insert
     $PeminjamanGalon = new PeminjamanGalon;
     $PeminjamanGalon->id_kostumer = $request->input('kostumer');
     $PeminjamanGalon->tanggal_pinjam = $request->input('tanggal');
     $PeminjamanGalon->jumlah_galon = $request->input('jumlah');
     $PeminjamanGalon->keterangan = $request->input('keterangan');
     $PeminjamanGalon->save();

     // redirect dengan session
     return redirect(route('peminjaman.form'))->with('success','data berhasil di simpan');
  }
}

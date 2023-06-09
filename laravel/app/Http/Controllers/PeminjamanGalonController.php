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
    $data['peminjaman'] = PeminjamanGalon::orderByDesc('tanggal_pinjam')->paginate(20);
    $data['kostumer'] = Kostumer::all();
    return view('form_pinjaman_galon',$data);
  }

  public function delete($id)
  {
    // modal delete
    $PeminjamanGalon = PeminjamanGalon::find($id);
  $PeminjamanGalon->delete();

  // redirect dengan session
  return redirect(route('peminjaman.form'))->with('success','data berhasil di perbaharui');
  }

  public function update(Request $request, $id)
  {
    // validate data input
    $validated = $request->validate([
      'jumlah' => 'required|numeric',
      'tanggal' => 'required',
    ]);

    // model update
    $PeminjamanGalon = PeminjamanGalon::find($id);
    $PeminjamanGalon->tanggal_pinjam = $request->input('tanggal');
    $PeminjamanGalon->jumlah_galon = $request->input('jumlah');
    $PeminjamanGalon->keterangan = $request->input('keterangan');
    $PeminjamanGalon->save();

    // redirect dengan session
    return redirect(route('peminjaman.form'))->with('success','data berhasil di perbaharui');

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

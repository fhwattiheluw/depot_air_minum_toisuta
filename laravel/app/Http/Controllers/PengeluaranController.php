<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
      $items = Pengeluaran::all();
      return view('kelola_jenis_pengeluaran', ['items'=>$items]);
    }

    public function form()
    {
      return view('form_pengeluaran');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'nama_pengeluaran' => 'required'
      ]);
      $item = new Pengeluaran();
      $item->nama_pengeluaran = $request->nama_pengeluaran;
      $item->save();

      return redirect(route('pengeluaran.kelola'));
    }
}

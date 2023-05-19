<?php

namespace App\Http\Controllers;

use App\Models\Kostumer;
use Illuminate\Http\Request;

class KostumerController extends Controller
{
    public function index()
    {
      $items = Kostumer::all();
      return view('kelola_data_customer', ['items'=>$items]);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'nama_kostumer' => 'required',
        'alamat' => 'required',
        'telp' => 'required'
      ]);
      $item = new Kostumer;
      $item->nama_kostumer = $request->nama_kostumer;
      $item->alamat = $request->alamat;
      $item->telp = $request->telp;
      $item->save();

      return redirect(route('kostumer.kelola'));
    }
}

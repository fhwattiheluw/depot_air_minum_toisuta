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
        'nama_kostumer' => 'required|unique:kostumers,nama_kostumer',
        'alamat' => 'required',
        'telp' => 'required|numeric'
      ]);
      $item = new Kostumer;
      $item->nama_kostumer = $request->nama_kostumer;
      $item->alamat = $request->alamat;
      $item->telp = $request->telp;
      $item->save();
      // redirect kembali
      // flashdata
      $request->session()->flash('status', 'Task was successful!');
      return redirect(route('kostumer.kelola'));
    }
}

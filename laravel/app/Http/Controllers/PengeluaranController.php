<?php

namespace App\Http\Controllers;

use App\Models\item_pengeluaran;
use Illuminate\Http\Request;
// https://laravel.com/docs/8.x/encryption
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class PengeluaranController extends Controller
{
    public function index()
    {
      $items = item_pengeluaran::all();
      return view('kelola_jenis_pengeluaran', ['items'=>$items]);

    }

    public function remove(Request $request,$id)
    {
      // decrypt
      echo $id =Crypt::decryptString($id);
      // model delete
      item_pengeluaran::destroy($id);
      // redirect kembali
      // flashdata
      $request->session()->flash('status', 'Task was successful!');
      return redirect(route('pengeluaran.kelola'));
    }

  public function update(Request $request, $id)
    {
      // decrypt
      $id =Crypt::decryptString($id);
      // // validate
      $this->validate($request, [
        'nama_pengeluaran' => 'required|unique:item_pengeluaran,nama_item'
      ]);
      // model update
      $data = array('nama_item' => $request->nama_pengeluaran);
      item_pengeluaran::where('id', $id)->update($data);

      // redirect kembali
      // flashdata
      $request->session()->flash('status', 'Task was successful!');
      return redirect(route('pengeluaran.kelola'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'nama_pengeluaran' => 'required|unique:item_pengeluaran,nama_item'
      ]);

      $item = new item_pengeluaran();
      $item->nama_item = $request->nama_pengeluaran;
      $item->save();

      $request->session()->flash('status', 'Task was successful!');
      return redirect(route('pengeluaran.kelola'));
    }
}

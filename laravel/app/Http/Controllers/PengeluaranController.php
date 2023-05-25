<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
// https://laravel.com/docs/8.x/encryption
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

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

    public function remove(Request $request,$id)
    {
      // decrypt
      echo $id =Crypt::decryptString($id);
      // model delete
      Pengeluaran::destroy($id);
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
        'nama_pengeluaran' => 'required|unique:pengeluarans,nama_pengeluaran'
      ]);
      // model update
      $data = array('nama_pengeluaran' => $request->nama_pengeluaran);
      Pengeluaran::where('id', $id)->update($data);

      // redirect kembali
      // flashdata
      $request->session()->flash('status', 'Task was successful!');
      return redirect(route('pengeluaran.kelola'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'nama_pengeluaran' => 'required|unique:pengeluarans,nama_pengeluaran'
      ]);
      $item = new Pengeluaran();
      $item->nama_pengeluaran = $request->nama_pengeluaran;
      $item->save();

      $request->session()->flash('status', 'Task was successful!');
      return redirect(route('pengeluaran.kelola'));
    }
}

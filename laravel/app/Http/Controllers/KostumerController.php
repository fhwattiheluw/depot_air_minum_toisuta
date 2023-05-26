<?php

namespace App\Http\Controllers;

use App\Models\Kostumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function update(Request $request, $id)
    {
      
      $id =Crypt::decryptString($id);

      $this->validate($request, [
        'nama_kostumer'=>'required|min:3|max:50',
        'telp'=>'required|max:50',
        'alamat'=>'required'
      ]);
      
      $item = Kostumer::find($id);
      $item->update([
        'nama_kostumer' => $request->nama_kostumer,
        'telp' => $request->telp,
        'alamat' => $request->alamat
      ]);
      
      return redirect(route('kostumer.kelola'))->with('status','Berhasil update data Kostumer');

    }

    public function remove($id)
    {
      $id = Crypt::decryptString($id);
      Kostumer::where('id', $id)->delete();

      return redirect(route('kostumer.kelola'))->with('status','Berhasil Hapus data Kostumer');

    }
}

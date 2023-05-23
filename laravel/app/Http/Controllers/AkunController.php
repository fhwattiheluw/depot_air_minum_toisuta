<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// modul enkrip
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class AkunController extends Controller
{
  public function kelola()
  {
    $items = User::all();
    return view('kelola_user', ['items'=>$items]);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'=>'required|min:3|max:100',
      'email'=>'required|email|unique:users,email',
      'password'=>'required'
    ]);

    $item = new User;
    $item->name = $request->name;
    $item->email = $request->email;
    $item->level = 'operator';
    $item->password = bcrypt($request->password);
    $item->save();

    // flashdata
    $request->session()->flash('status', 'Task was successful!');
    return redirect(route('user.kelola'));
  }

  public function remove(Request $request,$id)
  {
    // decrypt
    $id =Crypt::decryptString($id);
    // model
    User::where('id', $id)->delete();

    // redirect kembali
    // flashdata
    $request->session()->flash('status', 'Task was successful!');
    return redirect(route('user.kelola'));
  }

  public function update(Request $request,$id)
  {
    // decrypt
    $id =Crypt::decryptString($id);

    // cek kesamaan email
    $akun_user =  User::where('id', $id)->first();
    if ($akun_user->email == $request->input('email')) {
      // validate
      $this->validate($request, [
        'name'=>'required|min:3|max:100',
        'email'=>'required|email',
        'password'=>'required'
      ]);
    }else{
      // validate
      $this->validate($request, [
        'name'=>'required|min:3|max:100',
        'email'=>'required|email|unique:users,email',
        'password'=>'required'
      ]);
    }

    // model update
    $data_update = array('email' => $request->input('email'),
    'name' => $request->input('name'),
    'password' => $request->input('password')
  );
  User::where('id', $id)->update($data_update);

  // redirect kembali
  // flashdata
  $request->session()->flash('status', 'Task was successful!');
  return redirect(route('user.kelola'));

}
}

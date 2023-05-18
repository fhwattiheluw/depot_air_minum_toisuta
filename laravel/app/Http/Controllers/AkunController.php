<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        'email'=>'required|email',
        'password'=>'required'
      ]);
      
      $item = new User;
      $item->name = $request->name;
      $item->email = $request->email;
      $item->level = 'operator';
      $item->password = bcrypt($request->password);
      $item->save();
      return redirect(route('user.kelola'));

      // return back()->withErrors(['login' => 'Email atau password salah']);
    }
}

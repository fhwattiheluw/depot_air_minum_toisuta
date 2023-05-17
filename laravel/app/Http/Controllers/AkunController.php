<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function kelola()
    {
      return view('kelola_user');
    }
}

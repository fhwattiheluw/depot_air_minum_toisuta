<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanGalonController extends Controller
{
    public function form()
    {
      return view('form_pinjaman_galon');
    }
}

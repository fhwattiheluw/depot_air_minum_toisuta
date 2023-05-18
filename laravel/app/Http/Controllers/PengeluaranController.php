<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
      return view('kelola_jenis_pengeluaran');
    }

    public function form()
    {
      return view('form_pengeluaran');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapanController extends Controller
{
    public function semua()
    {
      return view('rekapan_semua');
    }

    public function pengantaran()
    {
      return view('rekapan_pengantaran');
    }

    public function kostumer($value='')
    {
      return view('rekapan_penjualan_kostumer');
    }

    public function pengeluaran($value='')
    {
      return view('rekapan_pengeluaran');
    }
}

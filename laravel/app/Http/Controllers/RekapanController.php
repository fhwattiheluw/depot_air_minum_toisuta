<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class RekapanController extends Controller
{
    public function semua()
    {
      return view('rekapan_semua');
    }

    public function pengantaran()
    {
      $data['penjualan'] = DB::table('penjualans')->select(DB::raw('tanggal,sum(tempat) as tempat,sum(mobil) as mobil,sum(motor) as motor,sum(total_harga)'))->groupBy('tanggal')->get();
      return view('rekapan_pengantaran',$data);
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

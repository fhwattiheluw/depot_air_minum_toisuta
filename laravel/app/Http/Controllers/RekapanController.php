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

    public function pengantaran(Request $request,$m = null,$y = null)
    {
      $m = $request->m;
      $y = $request->y;
      $data['filter'] = ['bulan' => $m, 'tahun' => $y];
      $data['penjualan'] = DB::table('penjualans')->select(DB::raw('tanggal,sum(tempat) as tempat,sum(mobil) as mobil,sum(motor) as motor,sum(total_harga)'))->whereMonth('tanggal', $m)->whereYear('tanggal', $y)->groupBy('tanggal')->get();
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

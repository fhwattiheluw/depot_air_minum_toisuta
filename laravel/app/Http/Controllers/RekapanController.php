<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class RekapanController extends Controller
{
    public function semua(Request $request, $bulan = null, $tahun = null)
    {
      $bulan = $request->bulan;
      $tahun = $request->tahun;
      $data['filter'] = ['bulan' => $bulan, 'tahun' => $tahun];
      $data['penjualan'] = Penjualan::select(DB::raw('tanggal,sum(total_penjualan) as total'))->whereMonth('tanggal', $bulan)->whereYear('tanggal',$tahun)->groupBy('tanggal')->get();
      $data['total'] =  Penjualan::select(DB::raw('sum(total_penjualan) as total'))->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->first();

      return view('rekapan_semua',$data);
    }

    public function pengantaran(Request $request,$m = null,$y = null)
    {
      $m = $request->m;
      $y = $request->y;
      $data['filter'] = ['bulan' => $m, 'tahun' => $y];
      $data['penjualan'] = DB::table('penjualans')->select(DB::raw('tanggal,sum(tempat) as tempat,sum(mobil) as mobil,sum(motor) as motor,sum(total_harga) as total_harga'))->whereMonth('tanggal', $m)->whereYear('tanggal', $y)->groupBy('tanggal')->get();
      $data['total'] = DB::table('penjualans')->select(DB::raw('sum(total_harga) as penjualan'))->whereMonth('tanggal', $m)->whereYear('tanggal', $y)->first();
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

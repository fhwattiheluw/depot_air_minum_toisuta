<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\detail_penjualan;
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

  public function detail_penjualan(Request $request,$date = null)
  {
    // SELECT t1.*, t2.tanggal, t3.nama_kostumer
    // FROM detail_penjualan t1
    // LEFT JOIN penjualan t2 ON t1.id_penjualan = t2.id
    // LEFT JOIN kostumers t3 ON t1.id_kostumer = t3.id
    // WHERE t2.tanggal = '2023-06-02';
    $data['date'] = $date;

    $data['detail'] = detail_penjualan::select('detail_penjualan.*', 'penjualan.tanggal','kostumers.nama_kostumer')
    ->leftJoin('penjualan', 'detail_penjualan.id_penjualan', '=', 'penjualan.id')
    ->leftJoin('kostumers', 'detail_penjualan.id_kostumer', '=', 'kostumers.id')
    ->where('penjualan.tanggal',$date)
    ->get();

    return view('rekapan_detail_penjualan',$data);
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

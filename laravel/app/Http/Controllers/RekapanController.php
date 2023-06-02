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
    $data['penjualan'] = DB::select("SELECT penjualan.tanggal,
      SUM((SELECT SUM(detail_penjualan.jumlah)
      FROM detail_penjualan
      WHERE detail_penjualan.id_penjualan = penjualan.id
      AND detail_penjualan.tipe_penjualan = 'antar mobil')
    )AS total_mobil, SUM((SELECT SUM(detail_penjualan.jumlah)
    FROM detail_penjualan
    WHERE detail_penjualan.id_penjualan = penjualan.id
    AND detail_penjualan.tipe_penjualan = 'antar motor')
  )AS total_motor, SUM((SELECT SUM(detail_penjualan.jumlah)
  FROM detail_penjualan
  WHERE detail_penjualan.id_penjualan = penjualan.id
  AND detail_penjualan.tipe_penjualan = 'beli di tempat')
)AS total_tempat
FROM penjualan
where month(penjualan.tanggal) = :bulan and year(penjualan.tanggal) = :tahun
group by penjualan.tanggal
order by penjualan.tanggal asc",['bulan' => $m, 'tahun' => $y]);

return view('rekapan_pengantaran',$data);
}

public function kostumer(Request $request)
{
  $hari = $request->hari;
  $bulan = $request->bulan;
  $tahun = $request->tahun;
  $data['filter'] = ['hari' => $hari,'bulan' => $bulan, 'tahun' => $tahun];
  $query = "select t2.tanggal, sum(t1.jumlah) as jumlah , t3.nama_kostumer
  from detail_penjualan t1
  inner join penjualan t2 on t2.id = t1.id_penjualan
  inner join kostumers t3 on t3.id = t1.id_kostumer
  where day(t2.tanggal) = :hari and month(t2.tanggal) = :bulan and year(t2.tanggal) = :tahun
  group by t2.tanggal,t3.nama_kostumer";
  $data['rekapan'] = DB::select($query,['hari' => $hari,'bulan'=> $bulan,'tahun' => $tahun]);
  return view('rekapan_penjualan_kostumer',$data);
}

public function pengeluaran($value='')
{
  return view('rekapan_pengeluaran');
}
}

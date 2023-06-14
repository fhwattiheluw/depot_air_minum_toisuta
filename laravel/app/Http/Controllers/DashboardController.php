<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
      public function index()
      {
        echo $current_date = date('Y-m-d');
 $data['notif_pengembilan_galon'] = DB::select("select distinct kostumers.nama_kostumer, kostumers.telp, kostumers.alamat, penjualan.tanggal, penjualan.tanggal + INTERVAL 3 day as tanggal_interval
from kostumers
inner join detail_penjualan on kostumers.id = detail_penjualan.id_kostumer
inner join penjualan on detail_penjualan.id_penjualan = penjualan.id
where  penjualan.tanggal + INTERVAL 3 day = :date",['date' => $current_date]);
        return view('dashboard',$data);
      }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id';
    protected $fillable = ['tipe_penjualan','harga_satuan','jumlah','pembayaran','id_kostumer','id_penjualan'];
}

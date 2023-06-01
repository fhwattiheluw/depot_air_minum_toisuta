<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    // use HasFactory;
    protected $table = 'penjualans';
    protected $primaryKey = 'id';
    protected $fillable = ['tanggal','tipe_penjualan','harga_satuan','jumlah','total_harga','pembayaran','id_kostumer','motor','mobil','tempat'];
}

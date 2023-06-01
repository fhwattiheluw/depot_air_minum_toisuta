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

  public function penjualan()
  {
    return $this->belongsTo(Penjualan::class, 'id', 'id_penjualan');
  }

  public function kostumer()
  {
    return $this->belongsTo(Kostumer::class, 'id', 'id_kostumer');
  }
}

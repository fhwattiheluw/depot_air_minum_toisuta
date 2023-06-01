<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'detail_pengeluaran';
    protected $fillable = ['jumlah','harga_satuan','keterangan','nota','id_item','id_pengeluaran'];
}

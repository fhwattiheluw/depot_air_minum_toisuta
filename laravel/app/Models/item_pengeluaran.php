<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'item_pengeluaran';
    protected $fillable = ['nama_item'];


}

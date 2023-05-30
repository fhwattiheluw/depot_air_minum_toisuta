<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeminjamanGalon extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_galons';

    public function kostumer(): BelongsTo
{
    return $this->belongsTo(Kostumer::class,'id');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Kostumer extends Model
{
    use HasFactory;

    protected $table = 'kostumers';
    protected $guarded = ['id'];
    protected $fillable = ['nama_kostumer'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bbm extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kendaraan(){
        return $this->belongsTo(kendaraan::class);
    }

    public function Transaksi(){
        return $this->hasOne(Transaksi::class);
    }
}

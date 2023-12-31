<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
    
    public function Kendaraan()
    {
        return $this->hasOne(Kendaraan::class);
    }

}

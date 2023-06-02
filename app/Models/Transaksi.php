<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $guarded = '';

    public function JenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class, 'kd_jenis_kendaraan', 'kd_jenis_kendaraan');
    }

    public function bbm()
    {
        return $this->belongsTo(Bbm::class, 'kd_bbm');
    }

    public function Kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kd_kendaraan', 'kd_kendaraan');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

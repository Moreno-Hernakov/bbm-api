<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Komposisi()
    {
        return $this->hasOne(Komposisi::class);
    }
    
    public function Kendaraan()
    {
        return $this->hasOne(Kendaraan::class);
    }

}

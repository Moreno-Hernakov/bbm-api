<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bbm(){
        return $this->hasOne(bbm::class);
    }

    public function Unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function JenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }

}

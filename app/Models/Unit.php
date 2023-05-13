<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Area()
    {
        return $this->belongsTo(Area::class);
    }

    public function Kendaraan()
    {
        return $this->hasOne(Kendaraan::class);
    }

}

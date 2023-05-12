<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Area()
    {
        return $this->hasOne(Area::class);
    }

    public function Kendaraan()
    {
        return $this->hasOne(Kendaraan::class);
    }

    public function Unit()
    {
        return $this->hasOne(Unit::class);
    }



}

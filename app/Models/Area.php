<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Wilayah()
    {
        return $this->belongsTo(Wilayah::class);
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

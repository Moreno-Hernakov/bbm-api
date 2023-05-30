<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region(){
        return $this->belongsTo(Region::class, 'kd_region', 'kd_region');
    }
    
    public function Unit()
    {
        return $this->hasOne(Unit::class);
    }
}

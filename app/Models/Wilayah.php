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



}

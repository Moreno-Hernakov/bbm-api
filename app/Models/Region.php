<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function area()
    {
        return $this->hasOne(area::class);
    }

    protected $fillable = [
        'kd_region',
        'nama_region',
    ];
}

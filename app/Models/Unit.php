<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'kd_unit';

    protected $fillable = ['kd_unit', 'kd_area', 'nama_unit'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'kd_area', 'kd_area');
    }

    public function kendaraan()
    {
        return $this->hasOne(Kendaraan::class);
    }

    public function User()
    {
        return $this->hasOne(User::class);
    }
}

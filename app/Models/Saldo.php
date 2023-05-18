<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $guarded = '';

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function History()
    {
        return $this->hasMany(History::class, 'saldo_id');
    }
}

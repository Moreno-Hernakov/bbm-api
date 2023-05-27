<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index(){
        return History::with('User')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function store($status, $jumlah, $saldo_id){
        History::create([
            'jumlah' => $jumlah,
            'status' => $status,
            'saldo_id' => $saldo_id,
        ]);
    }
}

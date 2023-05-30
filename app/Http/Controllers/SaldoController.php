<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;

class SaldoController extends Controller
{
    public function index()
    {
        return saldo::with('User', 'History')->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $saldo = request()->validate([
            'jumlah_saldo' => 'required|integer',
            'kd_unit' => 'required|integer',
        ]);

        $saldo['user_id'] = auth()->user()->id;
        saldo::create($saldo);

        $saldo_latest = saldo::latest()->first();

        app('App\Http\Controllers\HistoryController')->store('tambah', $saldo['jumlah_saldo'], $saldo_latest->id);

        return response()->json([
            'success' => true,
            'message' => 'saldo berhasil ditambahakan'
        ]);
    }

    public function kurang($jumlah_uang)
    {
        $saldo['user_id'] = auth()->user()->id;

        $saldo = saldo::latest()->first();
        
        if($saldo->jumlah_saldo < $jumlah_uang){
            return response()->json(abort(400, "uang tidak mencukupi"));
        }

        saldo::where('user_id', auth()->user()->id)->update([
            'jumlah_saldo' => $saldo->jumlah_saldo - $jumlah_uang
        ]);

        app('App\Http\Controllers\HistoryController')->store('kurang', $jumlah_uang, $saldo->id);
    }
}

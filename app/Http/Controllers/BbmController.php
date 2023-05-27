<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bbm;

class BbmController extends Controller
{
    public function index(){
        return response()->json(bbm::with('kendaraan.jeniskendaraan', 'kendaraan.unit')->get());
    }

    public function store(){
        $bbm = request()->validate([
            'nama_spbu' => 'required|min:2',
            'jenis_bbm' => 'required|min:2',
            'kendaraan_id' => 'required',
        ]);

        bbm::create($bbm);

        return response()->json([
            'success' => true,
            'message' => 'bbm berhasil ditambahakan'
        ]);
    }
}

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
            'jenis_bbm' => 'required|min:2',
        ]);

        bbm::create($bbm);

        return response()->json([
            'success' => true,
            'message' => 'bbm berhasil ditambahakan'
        ]);
    }
}

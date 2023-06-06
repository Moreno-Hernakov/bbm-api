<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bbm;

class BbmController extends Controller
{
    public function index(){
        return response()->json(bbm::all());
    }

    public function store(){
        $bbm = request()->validate([
            'jenis_bbm' => 'required|min:2',
        ]);

        Bbm::create($bbm);

        return response()->json([
            'success' => true,
            'message' => 'Bbm berhasil ditambahakan'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $region = Region::all();
        return response()->json($region);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $region = $request->validate([
            'kd_region' => 'required',
            'nama_region' => 'required',
        ]);

        Region::create($region);

        return response()->json([
            'success' => true,
            'message' => 'region berhasil ditambahakan',
            'data' => $region
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit = unit::with('area.region')->get();
        return response()->json($unit);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = $request->validate([
            'kd_unit' => 'required',
            'kd_area' => 'required',
            'nama_unit' => 'required',
        ]);

        Unit::create($unit);

        return response()->json([
            'success' => true,
            'message' => 'unit berhasil ditambahakan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kd_unit)
    {
        $data = $request->validate([
            'kd_unit' => 'required',
            'kd_area' => 'required',
            'nama_unit' => 'required',
        ]);

        Unit::where('kd_unit', $kd_unit)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Unit berhasil diperbarui',
            'data' => $data
        ], 200);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json([
            'success' => true,
            'message' => 'Unit berhasil dihapus'
        ]);
    }
}

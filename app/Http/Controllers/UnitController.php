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
        $unit = unit::with('wilayah', 'area')->get();
        return response()->json($unit);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = request()->validate([
            'wilayah_id' => 'required',
            'area_id' => 'required',
        ]);

        unit::create($unit);

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
    public function update(Request $request, string $id)
    {
        $data = request()->validate([
            'wilayah_id' => 'required',
            'area_id' => 'required',
        ]);

        unit::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'unit berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unit $unit)
    {
        unit::destroy($unit->id);

        return response()->json([
            'success' => true,
            'message' => 'unit berhasil dihapus'
        ]);
    }
}

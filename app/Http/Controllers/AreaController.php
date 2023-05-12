<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $area = area::with('wilayah')->get();
        return response()->json($area);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $area = request()->validate([
            'nama_area' => 'required|min:2',
            'wilayah_id' => 'required',
        ]);

        area::create($area);

        return response()->json([
            'success' => true,
            'message' => 'area Kendaraan berhasil ditambahakan'
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
            'nama_area' => 'required|min:2',
        ]);

        area::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'area Kendaraan berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(area $area)
    {
        area::destroy($area->id);

        return response()->json([
            'success' => true,
            'message' => 'area Kendaraan berhasil dihapus'
        ]);
    }
}

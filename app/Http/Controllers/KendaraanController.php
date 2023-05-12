<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kendaraan = kendaraan::with('JenisKendaraan', 'unit.area.wilayah')->get();
        $kendaraan = kendaraan::with('JenisKendaraan', 'unit', 'area', 'wilayah')->get();
        return response()->json($kendaraan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kendaraan = request()->validate([
            'jenis_kendaraan_id' => 'required',
            'wilayah_id' => 'required',
            'area_id' => 'required',
            'unit_id' => 'required',
        ]);

        kendaraan::create($kendaraan);

        return response()->json([
            'success' => true,
            'message' => 'Kendaraan berhasil ditambahakan'
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
            'jenis_kendaraan_id' => 'required',
            'wilayah_id' => 'required',
            'area_id' => 'required',
            'unit_id' => 'required',
        ]);

        kendaraan::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Kendaraan berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kendaraan $kendaraan)
    {
        kendaraan::destroy($kendaraan->id);

        return response()->json([
            'success' => true,
            'message' => 'Kendaraan berhasil dihapus'
        ]);
    }
}

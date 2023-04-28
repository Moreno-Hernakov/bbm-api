<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKendaraan;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jeniskendaraan = jeniskendaraan::all();
        return response()->json($jeniskendaraan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jeniskendaraan = request()->validate([
            'jenis' => 'required|min:2',
        ]);

        jeniskendaraan::create($jeniskendaraan);

        return response()->json([
            'success' => true,
            'message' => 'Jenis Kendaraan berhasil ditambahakan'
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
            'jenis' => 'required|min:2',
        ]);

        jeniskendaraan::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Jenis Kendaraan berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jeniskendaraan $jeniskendaraan)
    {
        jeniskendaraan::destroy($jeniskendaraan->id);

        return response()->json([
            'success' => true,
            'message' => 'Jenis Kendaraan berhasil dihapus'
        ]);
    }
}

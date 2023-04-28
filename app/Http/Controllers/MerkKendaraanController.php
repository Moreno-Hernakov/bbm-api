<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerkKendaraan;

class MerkKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merkkendaraan = merkkendaraan::all();
        return response()->json($merkkendaraan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $merkkendaraan = request()->validate([
            'merk' => 'required|min:2',
        ]);

        merkkendaraan::create($merkkendaraan);

        return response()->json([
            'success' => true,
            'message' => 'Merk Kendaraan berhasil ditambahakan'
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
            'merk' => 'required|min:2',
        ]);

        merkkendaraan::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Merk Kendaraan berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(merkkendaraan $merkkendaraan)
    {
        merkkendaraan::destroy($merkkendaraan->id);

        return response()->json([
            'success' => true,
            'message' => 'Merk Kendaraan berhasil dihapus'
        ]);
    }
}

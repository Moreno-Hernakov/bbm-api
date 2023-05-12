<?php

namespace App\Http\Controllers;

use App\Models\Komposisi;
use Illuminate\Http\Request;

class KomposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komposisi = komposisi::with('MerkKendaraan')->get();
        return response()->json($komposisi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $komposisi = request()->validate([
            'jumlah_konsumsi_bbm' => 'required|min:2',
            'merk_kendaraan_id' => 'required',
        ]);

        komposisi::create($komposisi);

        return response()->json([
            'success' => true,
            'message' => 'komposisi berhasil ditambahakan'
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
            'jumlah_konsumsi_bbm' => 'required|min:2',
        ]);

        komposisi::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'komposisi berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(komposisi $komposisi)
    {
        komposisi::destroy($komposisi->id);

        return response()->json([
            'success' => true,
            'message' => 'komposisi berhasil dihapus'
        ]);
    }
}

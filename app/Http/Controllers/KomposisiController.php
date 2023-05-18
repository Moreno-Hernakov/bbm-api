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
        $komposisi = komposisi::with('JenisKendaraan')->get();
        return response()->json($komposisi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $komposisi = request()->validate([
            'jarak_tempuh' => 'required|integer',
            'jumlah_uang' => 'required|integer',
            'jumlah_konsumsi_bbm' => 'required|integer',
            'gambar' => 'required|mimes:jpeg,jpg,png',
            'jenis_Kendaraan_id' => 'required',
        ]);

        $data['gambar'] =  $request->file("gambar")->store('gambar', 'public');

        komposisi::create($komposisi);
        
        app('App\Http\Controllers\SaldoController')->kurang($komposisi['jumlah_uang']);

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
            'jarak_tempuh' => 'required|integer',
            'jumlah_uang' => 'required|integer',
            'jumlah_konsumsi_bbm' => 'required|integer',
            'gambar' => 'required|mimes:jpeg,jpg,png',
            'jenis_Kendaraan_id' => 'required',
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

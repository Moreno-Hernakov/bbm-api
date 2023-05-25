<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaksi = transaksi::with('JenisKendaraan')->get();
        return response()->json($transaksi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $transaksi = request()->validate([
            'jumlah_uang' => 'required|integer',
            'jumlah_konsumsi_bbm' => 'required|integer',
            'gambar_dashboard_kendaraan' => 'required|mimes:jpeg,jpg,png',
            'gambar_kwitansi' => 'required|mimes:jpeg,jpg,png',
            'jenis_Kendaraan_id' => 'required',
        ]);

        $transaksi['gambar_dashboard_kendaraan'] =  $request->file("gambar_dashboard_kendaraan")->store('gambar_dashboard_kendaraan', 'public');
        $transaksi['gambar_kwitansi'] =  $request->file("gambar_kwitansi")->store('gambar_kwitansi', 'public');

        transaksi::create($transaksi);
        
        app('App\Http\Controllers\SaldoController')->kurang($transaksi['jumlah_uang']);

        return response()->json([
            'success' => true,
            'message' => 'transaksi berhasil ditambahakan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $data = request()->validate([
            'jumlah_uang' => 'required|integer',
            'jumlah_konsumsi_bbm' => 'required|integer',
            'gambar_dashboard_kendaraan' => 'required|mimes:jpeg,jpg,png',
            'gambar_kwitansi' => 'required|mimes:jpeg,jpg,png',
            'jenis_Kendaraan_id' => 'required',
        ]);

        transaksi::where('id', $id)->update($data);

        return response()->json([
            'success' => true,
            'message' => 'transaksi berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        transaksi::destroy($transaksi->id);

        return response()->json([
            'success' => true,
            'message' => 'transaksi berhasil dihapus'
        ]);
    }
}

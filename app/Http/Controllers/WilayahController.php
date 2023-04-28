<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayah = wilayah::all();
        return response()->json($wilayah);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wilayah = request()->validate([
            'nama_wilayah' => 'required|min:2',
        ]);

        wilayah::create($wilayah);

        return response()->json([
            'succes' => true,
            'message' => 'wilayah berhasil ditambahkan'
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        // return $request;
        $data = request()->validate([
            'nama_wilayah' => 'required|min:2',
        ]);

        wilayah::where('id', $wilayah->id)->update($data);

        return response()->json([
            'succes' => true,
            'message' => 'wilayah berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        wilayah::destroy($wilayah->id);

        return response()->json([
            'succes' => true,
            'message' => 'wilayah berhasil dihapus'
        ]);
    }
}

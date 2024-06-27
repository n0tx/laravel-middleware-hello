<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftar_pelanggan = Pelanggan::all();
        return response()->json([
            'status' => 'Ok',
            'message' => 'Daftar Pelanggan',
            'data' => $daftar_pelanggan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan',
            'no_hp' => 'required|string|max:15',
        ]);

        $pelanggan = Pelanggan::create($request->all());

        return response()->json([
            'status' => 'Ok',
            'message' => 'Berhasil membuat pelanggan',
            'data' => $pelanggan,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Informasi Pelanggan',
            'data' => $pelanggan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrfail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan,email,' . $id,
            'no_hp' => 'required|string|max:15',
        ]);

        $pelanggan->update($request->all());

        return response()->json([
            'status' => 'Ok',
            'message' => 'Update Pelanggan Berhasil',
            'data' => $pelanggan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => 'Pelanggan Berhasil Dihapus!',
            'data' => $pelanggan,
        ]);
    }
}

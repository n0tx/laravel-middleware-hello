<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        return response()->json([
            'status' => 'Ok',
            'message' => 'Daftar Menu',
            'data' => $menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255'
        ]);

        $menu = Menu::create($request->all());

        return response()->json([
            'status' => 'Ok',
            'message' => 'Berhasil Membuat Menu',
            'data' => $menu,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Informasi Menu',
            'data' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'nama_menu' => 'required|string|max:255'
        ]);

        $menu->update($request->all());

        return response()->json([
            'status' => 'Ok',
            'message' => 'Update Menu Berhasil',
            'data' => $menu,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => 'Menu Berhasil Dihapus!',
            'data' => $menu,
        ]);
    }
}

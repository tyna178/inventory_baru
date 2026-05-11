<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Menampilkan semua daftar barang (GET /api/items)
     */
    public function index()
    {
        $items = Item::with('category')->get();
        return response()->json($items, 200);
    }

    /**
     * Menyimpan barang baru (POST /api/items)
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'nama_item'   => 'required|string',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        $item = Item::create($request->all());
        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $item
        ], 201);
    }

    /**
     * Menampilkan satu barang spesifik (GET /api/items/{id})
     * INI ADALAH KODE YANG SEBELUMNYA KURANG
     */
    public function show($id)
    {
        $item = Item::with('category')->find($id);

        if (!$item) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        return response()->json($item, 200);
    }

    /**
     * Mengupdate data barang (PUT /api/items/{id})
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $item->update($request->all());
        return response()->json([
            'message' => 'Barang berhasil diperbarui',
            'data' => $item
        ], 200);
    }

    /**
     * Menghapus barang (DELETE /api/items/{id})
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'Barang berhasil dihapus'], 200);
    }
}
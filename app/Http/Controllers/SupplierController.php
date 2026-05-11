<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * GET: Menampilkan semua daftar supplier
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers, 200);
    }

    /**
     * POST: Menambahkan supplier baru
     */
    public function store(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $supplier = Supplier::create($request->all());

        return response()->json([
            'message' => 'Supplier berhasil ditambahkan',
            'data' => $supplier
        ], 201);
    }

    /**
     * GET {id}: Menampilkan detail satu supplier berdasarkan ID
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        return response()->json($supplier, 200);
    }

    /**
     * PUT {id}: Mengubah data supplier
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        $supplier->update($request->all());

        return response()->json([
            'message' => 'Data supplier berhasil diperbarui',
            'data' => $supplier
        ], 200);
    }

    /**
     * DELETE {id}: Menghapus data supplier
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        $supplier->delete();

        return response()->json([
            'message' => 'Supplier berhasil dihapus'
        ], 200);
    }
}
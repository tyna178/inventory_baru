<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        // Mengambil obat beserta data supplier-nya (Eager Loading)
        return response()->json(Medicine::with('supplier')->get(), 200);
    }

    public function store(Request $request)
    {
        $medicine = Medicine::create($request->all());
        return response()->json([
            'message' => 'Obat berhasil ditambahkan',
            'data' => $medicine
        ], 201);
    }

    public function show($id)
    {
        $medicine = Medicine::with('supplier')->find($id);
        if (!$medicine) return response()->json(['message' => 'Obat tidak ditemukan'], 404);
        return response()->json($medicine, 200);
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        if (!$medicine) return response()->json(['message' => 'Obat tidak ditemukan'], 404);

        $medicine->update($request->all());
        return response()->json([
            'message' => 'Data obat diperbarui',
            'data' => $medicine
        ], 200);
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        if (!$medicine) return response()->json(['message' => 'Obat tidak ditemukan'], 404);

        $medicine->delete();
        return response()->json(['message' => 'Obat berhasil dihapus'], 200);
    }
}
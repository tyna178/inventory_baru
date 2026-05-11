<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    /**
     * Nama tabel (opsional jika nama tabel adalah jamak dari nama model)
     */
    protected $table = 'medicines';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Pastikan nama field di sini sama dengan yang ada di migration.
     */
    protected $fillable = [
        'name',
        'price',
        'stock',
        'supplier_id',
    ];

    /**
     * Relasi: Satu Medicine (Obat) dimiliki oleh satu Supplier.
     * Relasi ini disebut "Inverse One-to-Many".
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
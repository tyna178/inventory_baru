<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Menentukan kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * Relasi: Satu Supplier memiliki banyak Medicine (Obat)
     */
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
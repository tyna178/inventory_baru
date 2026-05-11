<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * Secara default Laravel akan menganggap namanya 'categories'.
     */
    protected $table = 'categories';

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     * Sesuaikan dengan nama kolom di migration Anda.
     */
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    /**
     * Relasi: Satu Kategori memiliki banyak Item (One-to-Many).
     * * Dengan fungsi ini, Anda bisa memanggil data seperti:
     * $category = Category::find(1);
     * $items = $category->items;
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }
}
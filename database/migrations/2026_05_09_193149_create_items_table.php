<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel categories
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('nama_item');
            $table->integer('stok')->default(0);
            $table->decimal('harga', 15, 2); // Contoh: 100000.00
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
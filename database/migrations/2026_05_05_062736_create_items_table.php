<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('quantity')->default(0);
            $table->decimal('price', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    // ... biasanya ada fungsi down() juga di bawahnya
};
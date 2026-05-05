<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name']; // <-- Pastikan tanda koma dan kurungnya benar

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
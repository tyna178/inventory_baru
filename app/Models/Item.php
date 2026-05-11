<?php

class Item extends Model {
use HasFactory;
protected $fillable = [
'name',
'quantity',
'price',
'category_id',
];
public function category() {
return $this->belongsTo(Category::class);
}
}
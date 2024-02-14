<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image'
      
    ];
    public function products()
{
    return $this->hasMany(Product::class,'category_id');
}
}

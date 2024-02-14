<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorie;

class Product extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'title',
        'price',
        'image',
        'product_code',
        'description',
        'category_id'
    ];
    public function category()
{
    return $this->belongsTo(categorie::class,'category_id','id');
}
public function lignecommandes()
{
    return $this->hasMany(LigneCommande::class,'product_id','id');
}
}
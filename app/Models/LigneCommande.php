<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;

class LigneCommande extends Model
{
    public function commande()
    {
        return $this->belongsTo(Commande::class,'commande_id','id');
    }
    public function product()
    {
        return $this->belongsto(Product::class,'product_id','id');
    }
}

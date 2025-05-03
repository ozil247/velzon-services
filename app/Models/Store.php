<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable =
     [
        'user_id', 
        'product_name',
         'price', 
         'status'
    ];

    public function images()
    {
        return $this->hasMany(ProdcuctImage::class);
    }
}

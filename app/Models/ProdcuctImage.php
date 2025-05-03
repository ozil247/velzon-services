<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdcuctImage extends Model
{

    protected $fillable = 
    [
        'store_id',
        'image'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}


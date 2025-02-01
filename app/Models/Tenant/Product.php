<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    public function centralProduct()
    {
        return $this->belongsTo(\App\Models\CentralProduct::class, 'central_product_id');
    }
}

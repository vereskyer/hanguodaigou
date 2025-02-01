<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant\Product as TenantProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CentralProduct extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql'; // 或者您的主數據庫連接名稱
    protected $table = 'central_products';
    protected $guarded = [];
    
    public function tenantProducts()
    {
        return $this->hasMany(TenantProduct::class, 'central_product_id');
    }
}

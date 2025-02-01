<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\CentralProduct;
use App\Models\Tenant\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        // 获取产品并按创建时间降序排列，同时分页
        $products = Product::orderBy('created_at', 'desc')->paginate(5);

        // 为每个产品添加完整的图片 URL
        $products->getCollection()->transform(function ($product) {
            $product->image_url = $product->image
                ? tenant_asset('products/' . basename($product->image))
                : null; // 如果没有图片，设置为 null
            return $product;
        });

        // 返回给 Inertia 渲染
        return Inertia::render('Tenant/Product/Index', [
            'products' => $products,
        ]);
    }


    public function create()
    {
        return Inertia::render('Tenant/Product/Create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $tenantDomain = tenant('domain'); // 租户的域名，例如 "aaa"

        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => ['nullable', 'file', 'max:3072', 'mimes:jpeg,jpg,png,webp'],
            'price' => 'required|int|min:0',
        ]);

        if ($request->hasFile('image')) {
            $fields['image'] = $request->file('image')->store('products', 'public');
        }


        $fields['image_storage_type'] = 'tenant'; // Store image in tenant storage

        Product::create($fields);

        // 构建租户隔离的图片 URL
        $imageUrl = $fields['image']
            ? tenant_asset('products/' . basename($fields['image']))
            : null;

        return redirect()->route('tenant.products.index')->with([
            'success',
            'Product created successfully.',
            'imageUrl' => $imageUrl
        ]);
    }


    public function listAvailableCentralProducts()
    {
        
        // Get imported central product IDs first
        $importedProductIds = Product::where('is_central_product', true)
            ->pluck('central_product_id');

        // Filter out already imported products in the query
        $centralProducts = CentralProduct::query()
            ->where('is_active', true)
            ->whereNotIn('id', $importedProductIds)
            ->latest()
            ->paginate(5);                                                                                                                                                                 

        return Inertia::render('Tenant/Product/CentralProduct', [
            'products' => $centralProducts
        ]);
    }


    public function importCentralProduct($centralProductId)
    {
        // 從中央數據庫獲取產品
        $centralProduct = CentralProduct::findOrFail($centralProductId);

        // 檢查這個產品是否已經被導入
        $existingProduct = Product::where('central_product_id', $centralProductId)->first();

        if ($existingProduct) {
            return redirect()->back()->with('error', '此產品已經導入過了');
        }

        // 在租戶的 products 表中創建新記錄
        $tenantProduct = Product::create([
            'central_product_id' => $centralProduct->id,
            'name' => $centralProduct->name,
            'description' => $centralProduct->description,
            'image' => $centralProduct->image,
            'image_storage_type' => 'central',
            'price' => $centralProduct->price,
            'is_active' => true,
            'is_central_product' => true
        ]);

        return redirect()->back()->with('success', '產品已成功導入');
    }
}

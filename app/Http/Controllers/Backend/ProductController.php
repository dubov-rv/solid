<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\ProductStoreRequest;
use App\Http\Requests\Backend\Product\ProductUpdateRequest;
use App\Models\Product\Product;
use App\Services\Product\ProductSaveService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('physicalProducts', 'digitalProducts')->latest()->paginate(30);

        dd($products);
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        $product = ProductSaveService::create($data['product_type'], $data);

        dd($product);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $updatedProduct = ProductSaveService::update($product, $data['product_type'], $data);

        dd($updatedProduct);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        dd('Product was deleted');
    }
}

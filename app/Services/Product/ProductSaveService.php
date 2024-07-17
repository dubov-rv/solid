<?php

namespace App\Services\Product;

use App\Models\Product\DigitalProduct;
use App\Models\Product\PhysicalProduct;
use App\Models\Product\Product;

class ProductSaveService
{
    public static function create($type, $data): Product
    {
        $product = Product::create($data);
        $productId = $product->id;

        switch ($type) {
            case Product::TYPE_PHYSICAL:
                PhysicalProduct::create([
                    'product_id' => $productId,
                    'weight' => $data['weight'],
                ]);
                break;

            case Product::TYPE_DIGITAL:
                DigitalProduct::create([
                    'product_id' => $productId,
                    'link' => $data['link'],
                ]);
                break;
        }

        return $product;
    }

    public static function update(Product $product, $type, $data): Product
    {
        $product->update($data);
        $productId = $product->id;

        switch ($type) {
            case Product::TYPE_PHYSICAL:
                if ($product->physicalProduct()->exists()) {
                    $physicalProduct = $product->physicalProduct()->first();
                    $physicalProduct->update(['weight' => $data['weight']]);
                } else {
                    PhysicalProduct::create([
                        'product_id' => $productId,
                        'weight' => $data['weight'],
                    ]);
                }
                break;

            case Product::TYPE_DIGITAL:
                if ($product->digitalProduct()->exists()) {
                    $digitalProduct = $product->digitalProduct()->first();
                    $digitalProduct->update(['link' => $data['link']]);
                } else {
                    DigitalProduct::create([
                        'product_id' => $productId,
                        'link' => $data['link'],
                    ]);
                }
                break;
        }

        return $product;
    }
}

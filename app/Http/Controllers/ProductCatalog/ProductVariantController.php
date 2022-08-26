<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatalog\ProductVariantStoreRequest;
use App\Http\Requests\ProductCatalog\ProductVariantUpdateRequest;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function create($product_id)
    {
        $product = Product::findOrFail($product_id);
        $attributes = Attribute::pluck('name', 'id');

        return view('pages.product_catalog.product.variant.create', [
            'product'    => $product,
            'attributes' => $attributes
        ]);
    }

    public function store(ProductVariantStoreRequest $request, $product_id)
    {
        $valid = $request->validated();

        $product = Product::findOrFail($product_id);

        if ($product->attr_1) {
            return redirect()->route('products.edit', $product->id);
        }

        $product->update($valid['attributes']);

        foreach ($valid['variants'] as $key => $variant) {
            $sku = $product->sku . '-' . $key;

            $variant['sku'] = $sku;
            $variant['barcode'] = $sku;

            $variantCreate = $product->variants()->create($variant);

            foreach ($variant['prices'] as $key => $price) {
                $variantCreate->prices()->create([
                    'price'      => $price,
                    'price_type' => $key
                ]);
            }
        }

        alert()->success('Create successfully')->toToast();

        return redirect()->route('products.edit', $product->id);
    }

    public function update(ProductVariantUpdateRequest $request, $variant_id)
    {
        $data = $request->validated();

        $variant = ProductVariant::findOrFail($variant_id);

        $variant->update($data);

        $prices = [];
        $user_id = \Auth::id();

        $options = [
            'user_id'            => $user_id,
            'product_variant_id' => $variant->id,
            'created_at'         => now(),
            'updated_at'         => now()
        ];

        if (!$variant->retail_price || $variant->retail_price->price !== $data['retail_price']) {
            array_push($prices, [
                'price_type'         => 'retail_price',
                'price'              => $data['retail_price'],
            ] + $options);
        }

        if (!$variant->ne_price || $variant->ne_price->price !== $data['ne_price']) {
            array_push($prices, [
                'price_type'         => 'ne_price',
                'price'              => $data['ne_price'],
            ] + $options);
        }

        if (!$variant->existing_price || $variant->existing_price->price !== $data['existing_price']) {
            array_push($prices, [
                'price_type'         => 'existing_price',
                'price'              => $data['existing_price'],
            ] + $options);
        }

        if (!$variant->agent_price || $variant->agent_price->price !== $data['agent_price']) {
            array_push($prices, [
                'price_type'         => 'agent_price',
                'price'              => $data['agent_price'],
            ] + $options);
        }

        $variant->prices()->insert($prices);

        alert()->success('Update successfully')->toToast();

        return back();
    }

    public function updateModal($variant_id)
    {
        $variant = ProductVariant::with('product')->findOrFail($variant_id);

        return view('pages.product_catalog.product.variant.update-modal', [
            'variant' => $variant
        ])->render();
    }
}

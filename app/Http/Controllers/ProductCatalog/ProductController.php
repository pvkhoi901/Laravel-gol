<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatalog\ProductStoreRequest;
use App\Http\Requests\ProductCatalog\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductCatalogService;
use Illuminate\Http\Request;
use App\DataTables\ProductCatalog\Product\ProductsDataTable;

class ProductController extends Controller
{
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductCatalogService();
    }

    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('pages.product_catalog.product.index');
    }

    public function create()
    {
        return view('pages.product_catalog.product.create', $this->productService->getDataFormProduct());
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['status'] = !empty($request->status);

            $product = Product::create($data);

            $product->addMultipleMediaFromRequest(['gallery'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('gallery');
                });

            alert()->success('Create successfully')->toToast();

            return redirect()->route('product-variants.create', $product->id);
        } catch (\Exception $e) {
            alert()->error('Create failed')->toToast();
            return back();
        }
    }

    public function edit($id)
    {
        $product = Product::with([
            'variants.user', 'attr_one', 'attr_two', 'attr_three',
            'variants.retail_price', 'variants.ne_price',
            'variants.existing_price', 'variants.agent_price'
        ])->findOrFail($id);

        $gallery = [];

        foreach ($product->getMedia('gallery') as $item) {
            array_push($gallery, $item->getFullUrl());
        }

        return view('pages.product_catalog.product.edit', [
            'product' => $product,
            'gallery' => $gallery,
        ] + $this->productService->getDataFormProduct());
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $data = $request->validated();
            $data['status'] = !empty($request->status);

            $product->update($data);

            if ($request->hasFile('gallery')) {
                $product->addMultipleMediaFromRequest(['gallery'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('gallery', 's3');
                    });
            }

            alert()->success('Update successfully')->toToast();
        } catch (\Exception $e) {
            alert()->error('Update failed')->toToast();
        }

        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('Destroy successfully')->toToast();
        return redirect()->route('products.index');
    }

    public function listByCategory(Request $request, $category_id)
    {
        $products = Product::where('category_id', $category_id)->pluck('model_name', 'id');

        if ($request->ajax()) {
            return apiSuccess($products);
        }

        return $products;
    }
}

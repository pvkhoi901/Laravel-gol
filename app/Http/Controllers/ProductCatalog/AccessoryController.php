<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Base\CrudParentController;
use App\Http\Requests\ProductCatalog\AccessoryRequest;
use App\Models\Accessory;
use App\Models\AccessoryAttribute;
use App\Models\Category;
use App\Services\ProductCatalogService;
use Illuminate\Support\Facades\DB;

class AccessoryController extends CrudParentController
{
    private $model;

    private $productService;

    public function __construct()
    {
        $this->setModel(Accessory::class);
        $this->model = $this->getModel();
        $this->productService = new ProductCatalogService();
    }

    public function create()
    {
        $categories = Category::active()->accessory()->pluck('name', 'id')->toArray();

        return view($this->model->getView('create'), [
            'categories' => PLEASE_SELECT + $categories,
            ] + $this->productService->getDataFormProduct());
    }

    public function store(AccessoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->model->fill($request->all());
                $this->model->save();
                $this->productService->createAttribute($this->model, $request, new AccessoryAttribute());
                alert()->success('Create successfully')->toToast();
            });
        } catch (\Exception $exception) {
            alert()->error('Create failed')->toToast();
        }
        return redirect()->route('accessories.index');
    }

    public function edit($id)
    {
        $model = $this->model->with('attributes')->findOrFail($id);
        $categories = Category::active()->accessory()->pluck('name', 'id')->toArray();

        return view($this->model->getView('edit'), [
            'model' => $model,
            'categories' => PLEASE_SELECT + $categories,
        ] + $this->productService->getDataFormProduct());
    }

    public function update(AccessoryRequest $request, Accessory $accessory)
    {
        try {
            DB::transaction(function () use ($accessory, $request) {
                $accessory->fill($request->all());
                $accessory->status = !empty($request->status);
                $accessory->save();
                $this->productService->createAttribute($accessory, $request, new AccessoryAttribute());
                alert()->success('Edit successfully')->toToast();
            });
        } catch (\Exception $exception) {
            alert()->error('Edit failed')->toToast();
        }
        return redirect()->route('accessories.index');
    }

    public function destroy(Accessory $accessory)
    {
        $accessory->delete();
        alert()->success('Destroy successfully')->toToast();
        return redirect()->route('accessories.index');
    }
}

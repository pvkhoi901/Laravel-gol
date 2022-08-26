<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Base\CrudParentController;
use App\Http\Requests\ProductCatalog\BrandRequest;
use App\Models\Brand;

class BrandController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(Brand::class);
        $this->model = $this->getModel();
    }

    public function store(BrandRequest $request)
    {
        $this->model->fill($request->all());
        $this->model->save();
        alert()->success('Create successfully')->toToast();
        return redirect()->route('brands.index');
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->fill($request->all());
        $brand->status = !empty($request->status);
        $brand->save();
        alert()->success('Edit successfully')->toToast();
        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        alert()->success('Destroy successfully')->toToast();
        return redirect()->route('brands.index');
    }
}

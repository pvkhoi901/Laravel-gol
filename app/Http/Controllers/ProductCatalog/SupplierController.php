<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Base\CrudParentController;
use App\Http\Requests\ProductCatalog\SupplierRequest;
use App\Models\Supplier;

class SupplierController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(Supplier::class);
        $this->model = $this->getModel();
    }

    public function store(SupplierRequest $request)
    {
        $this->model->fill($request->all());
        $this->model->save();
        alert()->success('Create successfully')->toToast();
        return redirect()->route('suppliers.index');
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->fill($request->all());
        $supplier->save();
        alert()->success('Edit successfully')->toToast();
        return redirect()->route('suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        alert()->success('Destroy successfully')->toToast();
        return redirect()->route('suppliers.index');
    }
}

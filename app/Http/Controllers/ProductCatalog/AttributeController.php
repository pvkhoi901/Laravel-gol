<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Base\CrudParentController;
use App\Http\Requests\ProductCatalog\AttributeRequest;
use App\Models\Attribute;

class AttributeController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(Attribute::class);
        $this->model = $this->getModel();
    }

    public function store(AttributeRequest $request)
    {
        $this->model->fill($request->all());
        $this->model->save();
        alert()->success('Create successfully')->toToast();
        return redirect()->route('attributes.index');
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->fill($request->all());
        $attribute->save();
        alert()->success('Edit successfully')->toToast();
        return redirect()->route('attributes.index');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        alert()->success('Destroy successfully')->toToast();
        return redirect()->route('attributes.index');
    }
}

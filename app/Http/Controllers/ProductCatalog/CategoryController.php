<?php

namespace App\Http\Controllers\ProductCatalog;

use App\Http\Controllers\Base\CrudParentController;
use App\Http\Requests\ProductCatalog\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(Category::class);
        $this->model = $this->getModel();
    }

    public function create()
    {
        $categories = $this->model->pluck('name', 'id')->toArray();
        return view($this->model->getView('create'), [
            'model' => $this->model,
            'categories' => PLEASE_SELECT + $categories,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->model->fill($request->all());
        $this->model->save();
        alert()->success('Create successfully')->toToast();
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        $categories = $this->model->pluck('name', 'id')->toArray();
        return view($this->model->getView('edit'), [
            'model' => $model,
            'categories' => PLEASE_SELECT + $categories,
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->display = !empty($request->display);
        $category->status = !empty($request->status);
        $category->save();
        alert()->success('Edit successfully')->toToast();
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('Destroy successfully')->toToast();
        return redirect()->route('categories.index');
    }
}

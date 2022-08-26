<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CrudParentController extends Controller
{
    private $model;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = new $model;
    }

    public function index()
    {
        return view($this->model->getView('index'), [
            'collection' => [],
        ]);
    }

    public function filter()
    {
        $data = [];
        if (request()->ajax()) {
            $data = $this->model->latest();
        }
        return Datatables::of($data)->make(true);
    }

    public function create()
    {
        return view($this->model->getView('create'), [
            'model' => $this->model,
        ]);
    }

    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        return view($this->model->getView('edit'), [
            'model' => $model,
        ]);
    }
}

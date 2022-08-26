<?php

namespace App\Http\Controllers\Manager;

use App\APIResponse\Message;
use App\Http\Controllers\Base\CrudParentController;
use Illuminate\Http\Request;
use App\Models\CategoryApi;
use App\DataTables\ManagerDatatable\CategoryApiDataTable;
use App\Models\ApiDetail;

class CategoryApiController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(CategoryApi::class);
        $this->model = $this->getModel();
    }

    public function index()
    {

        $category_api_datatable =  new CategoryApiDataTable(request());

        return $category_api_datatable->render($this->model->getView('index'), []);
    }


    public function filter()
    {
        $category_api_datatable =  new CategoryApiDataTable(request());
        return $category_api_datatable->render($this->model->getView('index'));
    }
    public function show()
    {
        $category_api_datatable =  new CategoryApiDataTable(request());
        return $category_api_datatable->render($this->model->getView('index'));
    }

    public function create()
    {
        return view($this->model->getView('create'), [
            'model' => $this->model,
        ]);
    }

    public function store(Request $request)
    {
        if (empty($request->status)) {
            $this->model->status = 0;
        }
        $this->model->fill($request->all());
        // $this->model->created_by = auth()->id();
        // $this->model->updated_by = auth()->id();
        $this->model->save();

        alert()->success('Create successfully')->toToast();
        return redirect()->route('categoryapi.index');
    }

    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        return view($this->model->getView('edit'), [
            'model' => $model,
        ]);
    }

    public function update(Request $request, int $category_api_id)
    {
        if ($category_api =  CategoryApi::find($category_api_id)) {
            if (empty($request->status)) {
                $category_api->status = 0;
            }
            $category_api->fill($request->all());
            $category_api->save();

            alert()->success('Edit successfully')->toToast();
            return redirect()->route('categoryapi.index');
        }
        alert()->error('Update Error')->toToast();
        return redirect()->route('categoryapi.index');
    }

    public function destroy(int $category_api_id)
    {
        if ($category_api =  CategoryApi::find($category_api_id)) {
            $category_api->delete();
            alert()->success('Destroy successfully')->toToast();
            return redirect()->route('categoryapi.index');
        }
        alert()->error('Destroy Error')->toToast();
        return redirect()->route('categoryapi.index');
    }

    public function updateCategorStatus(Request $request)
    {
        try {
            $cateogry_id = $request->cateogry_id ?? "";
            $status = $request->status ?? "";
            $youtube_category =  CategoryApi::find($cateogry_id);
            $youtube_category->status = $status;
            $youtube_category->save();
            return response()->json([
                'status' => 200,
                'message' => 'Success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 200,
                'error' => $th
            ]);
        }
    }


    public function getListApiByCategory(Request $requetst)
    {
        $categories =  CategoryApi::orderBy("order_by" , "ASC")->get();
        $category_api_id = $requetst->category_api_id ?? 1;
        $apis  = ApiDetail::where("id", ">",  0);
        if ($category_api_id != "") {
            $apis  = $apis->where("category_id", $category_api_id);
        }
        $apis =  $apis->orderBy("order_by", "DESC")->get();

        return view($this->model->getView('list_api_by_category'), [
            'model' => $this->model,
            'apis' => $apis,
            'categories' => $categories,
        ]);
    }

    /**
     * Lấy chi tiết thông tin api
     */
    public function getListApi(Request $requetst)
    {
        $category_id  = $requetst->category_id ?? "";
        $apis  = ApiDetail::where("category_id" , $category_id)->get();
        return view("pages.manager.category.list_api", [
            'apis' => $apis,
        ]);
    }
}

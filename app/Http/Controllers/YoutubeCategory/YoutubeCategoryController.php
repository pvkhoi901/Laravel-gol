<?php

namespace App\Http\Controllers\YoutubeCategory;

use App\APIResponse\Message;
use App\Http\Controllers\Base\CrudParentController;
use Illuminate\Http\Request;
use App\Models\YoutubeCategory;
use App\DataTables\YoutubeCategory\YoutubeCategoryDataTable;

class YoutubeCategoryController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(YoutubeCategory::class);
        $this->model = $this->getModel();
    }

    public function filter()
    {
        $plan_datatable =  new YoutubeCategoryDataTable(request());
        return $plan_datatable->render($this->model->getView('index'));
    }
    public function show()
    {
        $plan_datatable =  new YoutubeCategoryDataTable(request());
        return $plan_datatable->render($this->model->getView('index'));
    }

    public function index()
    {

        $plan_datatable =  new YoutubeCategoryDataTable(request());

        return $plan_datatable->render($this->model->getView('index'), []);
    }


    public function create()
    {
        return view($this->model->getView('create'), [
            'model' => $this->model,
        ]);
    }

    public function store(Request $request)
    {
        if(empty($request->status)) {
            $this->model->status = 0;
        }
        $this->model->fill($request->all());
        // $this->model->created_by = auth()->id();
        // $this->model->updated_by = auth()->id();
        $this->model->save();

        alert()->success('Create successfully')->toToast();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        return view($this->model->getView('edit'), [
            'model' => $model,
        ]);
    }

    public function update(Request $request, int $plan_id)
    {
        if ($plan =  YoutubeCategory::find($plan_id)) {
            if(empty($request->status)) {
                $plan->status = 0;
            }
            $plan->fill($request->all());
            $plan->save();

            alert()->success('Edit successfully')->toToast();
            return redirect()->route('category.index');
        }
        alert()->error('Update Error')->toToast();
        return redirect()->route('category.index');
    }

    public function destroy(int $plan_id)
    {
        if ($discount =  YoutubeCategory::find($plan_id)) {
            $discount->delete();
            alert()->success('Destroy successfully')->toToast();
            return redirect()->route('category.index');
        }
        alert()->error('Destroy Error')->toToast();
        return redirect()->route('category.index');
    }

    public function updateCategorStatus(Request $request){
        try {
            $cateogry_id = $request->cateogry_id ?? "";
            $status = $request->status ?? "";
            $youtube_category =  YoutubeCategory::find($cateogry_id);
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
}

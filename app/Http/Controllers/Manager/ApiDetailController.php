<?php

namespace App\Http\Controllers\Manager;

use App\APIResponse\Message;
use App\Http\Controllers\Base\CrudParentController;
use Illuminate\Http\Request;
use App\Models\ApiDetail;
use App\DataTables\ManagerDatatable\ApiDetailDataTable;
use App\Models\ApiParames;
use App\Models\CategoryApi;

class ApiDetailController extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(ApiDetail::class);
        $this->model = $this->getModel();
    }

    public function index()
    {

        $category_api_datatable =  new ApiDetailDataTable(request());

        return $category_api_datatable->render($this->model->getView('index'), []);
    }


    public function filter()
    {
        $category_api_datatable =  new ApiDetailDataTable(request());
        return $category_api_datatable->render($this->model->getView('index'));
    }
    public function show()
    {
        $category_api_datatable =  new ApiDetailDataTable(request());
        return $category_api_datatable->render($this->model->getView('index'));
    }

    public function create()
    {
        $api_types  = ApiDetail::API_TYPE;
        $api_data_types  = ApiDetail::DATE_TYPE;
        $api_type_params  = ApiDetail::TYPE_PARAM;

        $categories = CategoryApi::getList();
        return view($this->model->getView('create'), [
            'model' => $this->model,
            'categories' => $categories,
            'api_types' => $api_types,
            'api_data_types' => $api_data_types,
            'api_type_params' => $api_type_params,
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


        $parama_name = $request->parama_name ?? [];
        $api_data_type = $request->api_data_type ?? [];
        $type_param = $request->type_param ?? [];
        $description_detail = $request->description_detail ?? [];
        $order_by_detail = $request->order_by_detail ?? [];
        foreach ($parama_name  as $key => $name) {
            $api_parames = new ApiParames();
            $api_parames->api_id =  $this->model->id;
            $api_parames->parama_name = $name;
            $api_parames->api_data_type = $api_data_type[$key];
            $api_parames->type_param = $type_param[$key];
            $api_parames->description_detail = $description_detail[$key];
            $api_parames->order_by_detail = $order_by_detail[$key];
            $api_parames->save();
        }


        alert()->success('Create successfully')->toToast();
        return redirect()->route('api_detail.index');
    }

    public function edit($id)
    {
        $api_types  = ApiDetail::API_TYPE;

        $api_data_types  = ApiDetail::DATE_TYPE;
        $api_type_params  = ApiDetail::TYPE_PARAM;

        $categories = CategoryApi::getList();
        $model = $this->model->findOrFail($id);


        $details = ApiParames::where("api_id", $id)->get();

        return view($this->model->getView('edit'), [
            'model' => $model,
            'categories' => $categories,
            'api_types' => $api_types,
            'api_data_types' => $api_data_types,
            'api_type_params' => $api_type_params,
            'details' => $details,
        ]);
    }

    public function update(Request $request, int $api_id)
    {
        if ($category_api =  ApiDetail::find($api_id)) {
            if (empty($request->status)) {
                $category_api->status = 0;
            }
            $category_api->fill($request->all());
            $category_api->save();


            ApiParames::where("api_id", $api_id)->delete();

            $parama_name = $request->parama_name ?? [];
            $api_data_type = $request->api_data_type ?? [];
            $type_param = $request->type_param ?? [];
            $description_detail = $request->description_detail ?? [];
            $order_by_detail = $request->order_by_detail ?? [];
            foreach ($parama_name  as $key => $name) {
                $api_parames = new ApiParames();
                $api_parames->api_id = $api_id;
                $api_parames->parama_name = $name;
                $api_parames->api_data_type = $api_data_type[$key];
                $api_parames->type_param = $type_param[$key];
                $api_parames->description_detail = $description_detail[$key];
                $api_parames->order_by_detail = $order_by_detail[$key];
                $api_parames->save();
            }



            alert()->success('Edit successfully')->toToast();
            return redirect()->route('api_detail.index');
        }
        alert()->error('Update Error')->toToast();
        return redirect()->route('api_detail.index');
    }

    public function destroy(int $api_id)
    {
        if ($category_api =  ApiDetail::find($api_id)) {
            $details = ApiParames::where("api_id", $api_id)->delete();
            $category_api->delete();
            alert()->success('Destroy successfully')->toToast();
            return redirect()->route('api_detail.index');
        }
        alert()->error('Destroy Error')->toToast();
        return redirect()->route('api_detail.index');
    }

    public function updateCategorStatus(Request $request)
    {
        try {
            $cateogry_id = $request->cateogry_id ?? "";
            $status = $request->status ?? "";
            $youtube_category =  ApiDetail::find($cateogry_id);
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
        return view($this->model->getView('list_api_by_category'), [
            'model' => $this->model,
        ]);
    }


    /**
     * Lấy chi tiết thông tin api
     */
    public function getDetailApi(Request $requetst)
    {
        $api_id  = $requetst->api_id ?? "";
        $detail  = ApiDetail::find($api_id);
        $api_types  = ApiDetail::API_TYPE;
        $details = ApiParames::where("api_id", $api_id)->orderBy("order_by_detail", "ASC")->get();
        return view("pages.manager.category.detail_api", [
            'detail' => $detail,
            'api_types' => $api_types,
            'details' => $details,
        ]);
    }

    /**
     * Lấy chi tiết thông tin api
     */
    public function viewDetailApi(Request $requetst, $api_id)
    {
        $detail  = ApiDetail::find($api_id);
        $details = ApiParames::where("api_id", $api_id)->get();
        return view("pages.manager.api_detail.detail", [
            'detail' => $detail,
            'details' => $details,
        ]);
    }


    /**
     * Remove the specified LanguageMessage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function duplicateApi($id)
    {
        $languageMessage = ApiDetail::find($id);
        $new_message = $languageMessage->replicate();
        $new_message->name =  "COPY " . $new_message->name;
        $new_message->save();

        $details = ApiParames::where("api_id", $id)->orderBy("order_by_detail", "ASC")->get();
        foreach ($details as $detail) {
            $new_detail_message = $detail->replicate();
            $new_detail_message->api_id = $new_message->id;
            $new_detail_message->save();
        }

        return redirect(route('api_detail.edit', $new_message->id));
    }
}

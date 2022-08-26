<?php

namespace App\DataTables\YoutubeCategory;

use App\Models\YoutubeCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class YoutubeCategoryDataTable extends DataTable
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('status', function ($record) {
                if ($record->status == 1) {
                    return '<div class="custom-control custom-switch">
                    <input class="custom-control-input form-control-lg status" id="'.$record->id.'" checked="checked" name="status" type="checkbox" value="'.$record->status.'">
                    <label class="custom-control-label pt-1" for="'.$record->id.'"></label>
                </div>';
                } else {
                    return '<div class="custom-control custom-switch">
                    <input class="custom-control-input form-control-lg status" id="'.$record->id.'" name="status" type="checkbox" value="'.$record->status.'">
                    <label class="custom-control-label pt-1" for="'.$record->id.'"></label>
                </div>';
                }
            })
            ->addColumn('id_youtube_category', function ($record) {
                return \App\Models\YoutubeCategory::CATEGORY_YOUTUBE_US[$record->id_youtube];
            })
            ->addColumn('action', function (YoutubeCategory $topup) {
                return '  
                <a href="category/' . $topup->id . '/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" data-url="category/delete/' . $topup->id . '" method="GET"
                    class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i>
                </a>
                ';
            })
            ->rawColumns(['action', 'status', 'id_youtube_category']);
    }

    public function query(YoutubeCategory $model)
    {
        return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('plan_data_table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('category.filter'), null,  [], [])
            ->dom("<'row mb-3'<'col-sm-6'B><'col-sm-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row mt-3'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>")
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            )->parameters([
                'responsive' => true,
                'autoWidth' => false
            ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('id_youtube_category')->title('ID Category Youtube'),
            Column::make('name_vn')->title('Name_VN'),
            Column::make('name_en')->title('Name_EN'),
            Column::make('name_ko')->title('Name_KR'),
            Column::make('name_cn')->title('Name_CN'),
            Column::make('numerical_order')->title('No.'),
            Column::make('status')->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'PlanSetting_' . date('YmdHis');
    }
}

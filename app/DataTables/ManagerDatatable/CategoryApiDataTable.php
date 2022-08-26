<?php

namespace App\DataTables\ManagerDatatable;

use App\Models\CategoryApi;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class CategoryApiDataTable extends DataTable
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
                    <input class="custom-control-input form-control-lg status" id="' . $record->id . '" checked="checked" name="status" type="checkbox" value="' . $record->status . '">
                    <label class="custom-control-label pt-1" for="' . $record->id . '"></label>
                </div>';
                } else {
                    return '<div class="custom-control custom-switch">
                    <input class="custom-control-input form-control-lg status" id="' . $record->id . '" name="status" type="checkbox" value="' . $record->status . '">
                    <label class="custom-control-label pt-1" for="' . $record->id . '"></label>
                </div>';
                }
            })
            ->addColumn('action', function (CategoryApi $topup) {
                return '  
                <a href="/managerapi/categoryapi/list_api?category_api_id=' . $topup->id . '" class="mr-2">Api List</i></a>
                <a href="/managerapi/categoryapi/' . $topup->id . '/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" data-url="category/delete/' . $topup->id . '" method="GET"
                    class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i>
                </a>
                ';
            })
            ->rawColumns(['action', 'status', 'id_youtube_category']);
    }

    public function query(CategoryApi $model)
    {
        return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('category_api_table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('categoryapi.filter'), null,  [], [])
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
            Column::make('name')->title('Tên'),
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
        return 'CategoryApi_' . date('YmdHis');
    }
}

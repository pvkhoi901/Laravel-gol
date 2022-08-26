<?php

namespace App\DataTables\ManagerDatatable;

use App\Models\ApiDescription;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ApiDescriptionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'api_descriptions.datatables_actions')
            ->editColumn('status', function ($record) {
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
            })->rawColumns(['action', 'status']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ApiDescription $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ApiDescription $model)
    {
        // return $model->newQuery()
        return  $model->filter($this->request());;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['searchable' => false],
            'title',
            // 'note',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'api_descriptions_datatable_' . time();
    }
}

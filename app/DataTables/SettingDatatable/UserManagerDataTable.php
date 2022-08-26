<?php

namespace App\DataTables\SettingDatatable;

use App\Models\UserManager;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserManagerDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'user_managers.datatables_actions')
        
        ->addColumn('action', function (UserManager $user) {
            return '<a href="' . route('user_manager.edit', $user->id) . '" class="btn btn-outline-primary">
            <i class="fas fa-edit"></i>Edit
                </a> 
                <a href="javascript:;" data-url="user_manager/delete/' . $user->id . '" method="GET"
                    class="btn-delete btn btn-danger"><i class="fas fa-trash"></i>
                </a>
                ';
        })->rawColumns(['action']);
        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserManager $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserManager $model)
    {
        return $model->newQuery();
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
            'name',
            'email',
            'theme',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_managers_datatable_' . time();
    }
}

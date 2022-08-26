<?php

namespace App\DataTables\System;

use App\Models\ServiceArea;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServiceAreaDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()->eloquent($query);
    }

    public function query(ServiceArea $model)
    {
        return $model->newQuery()
            ->select(DB::raw('company_id, state, count(CASE WHEN status=1 THEN 1 END) as zip_code_active_count, count(CASE WHEN status=0 THEN 1 END) as zip_code_inactive_count'))
            ->groupBy(['state', 'company_id'])
            ->orderBy('zip_code_active_count');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('rejection-reason-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row mb-3'<'col-sm-6'B><'col-sm-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row mt-3'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>")
            ->orderBy(1)
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
            Column::make('state'),
            Column::make('zip_code_active_count'),
            Column::make('zip_code_inactive_count'),
        ];
    }

    protected function filename()
    {
        return 'RejectionReason_' . date('YmdHis');
    }
}
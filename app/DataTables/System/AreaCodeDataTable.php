<?php

namespace App\DataTables\System;

use App\Models\AreaCode;
use App\Models\DisconnectionReason;
use App\Models\SacCode;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AreaCodeDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (AreaCode $areaCode) {
                return '
                <a href="' . route('area-code.edit', $areaCode->id) . '" class="btn btn-outline-primary">
                    Edit
                </a>
                ';
            });
    }

    public function query(AreaCode $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('area-code-table')
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
            Column::make('id'),
            Column::make('area_code'),
            Column::make('state'),
            Column::make('zip_code'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'AreaCode_' . date('YmdHis');
    }
}

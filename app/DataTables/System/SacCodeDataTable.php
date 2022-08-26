<?php

namespace App\DataTables\System;

use App\Models\DisconnectionReason;
use App\Models\SacCode;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SacCodeDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('type', function ($record) {
                return SacCode::TYPE[$record->type];
            })
            ->addColumn('action', function (SacCode $sacCode) {
                return '
                <a href="' . route('sac-code.edit', $sacCode->id) . '" class="btn btn-outline-primary">
                    Edit
                </a>
                ';
            });
    }

    public function query(SacCode $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('sac-code-table')
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
            Column::make('type'),
            Column::make('state'),
            Column::make('code'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'DisconnectionReason_' . date('YmdHis');
    }
}
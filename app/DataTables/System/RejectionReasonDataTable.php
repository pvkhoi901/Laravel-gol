<?php

namespace App\DataTables\System;

use App\Models\RejectionReason;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RejectionReasonDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->with('category')
            ->addColumn('category', function ($record) {
                return $record->category->name;
            })
            ->addColumn('status', function ($record) {
                return RejectionReason::STATUS[$record->status];
            })
            ->addColumn('action', function (RejectionReason $rejectionReason) {
                return '
                <a href="' . route('rejection-reason.edit', $rejectionReason->id) . '" class="btn btn-outline-primary">
                    Edit
                </a>
                ';
            });
    }

    public function query(RejectionReason $model)
    {
        return $model->newQuery();
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
            Column::make('id'),
            Column::make('category'),
            Column::make('name'),
            Column::make('description'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'RejectionReason_' . date('YmdHis');
    }
}
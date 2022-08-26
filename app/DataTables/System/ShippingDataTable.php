<?php

namespace App\DataTables\System;

use App\Models\ShippingPartner;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShippingDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('status_view', function ($record) {
                return '<span
                class="badge badge-' . status_class($record['status']) . '">' . status_text($record['status']) . '</span>';
            })
            ->addColumn('is_default_view', function ($record) {
                return '<span
                class="badge badge-' . status_class($record['is_default']) . '">' . status_text($record['is_default']) . '</span>';
            })
            ->addColumn('action', function (ShippingPartner $shipping_partner) {
                return '
                <a href="' . route('shipping-partners.edit', $shipping_partner->id) . '" class="btn btn-outline-primary">
                    Edit
                </a>
                ';
            })->rawColumns(['status_view' ,'is_default_view', 'action']);
    }

    public function query(ShippingPartner $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('shipping-partners-table')
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
            Column::make('name'),
            Column::computed('status_view')->title('Status'),
            Column::make('is_default_view')->title('Default')->orderable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'ShippingPartner_' . date('YmdHis');
    }
}

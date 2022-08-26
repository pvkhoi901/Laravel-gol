<?php

namespace App\DataTables\System;

use App\Models\RejectionReason;
use App\Models\ShelterAddress;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShelterAddressDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->with('category')
            ->addColumn('type_of_housing', function ($record) {
                return ShelterAddress::TYPE_OF_HOUSING[$record->type_of_housing];
            })
            ->addColumn('dwelling_houses', function ($record) {
                return ShelterAddress::DWELLLING_HOUSES[$record->dwelling_houses];
            })
            ->addColumn('state', function ($record) {
                return STATE[$record->state];
            })
            ->addColumn('melissa_state', function ($record) {
                return STATE[$record->melissa_state];
            })
            ->addColumn('status', function ($record) {
                return ShelterAddress::STATUS[$record->status];
            })
            ->addColumn('action', function (ShelterAddress $shelterAddress) {
                return '
                <a href="' . route('shelter-address.edit', $shelterAddress->id) . '" class="btn btn-outline-primary">
                    Edit
                </a>
                ';
            });
    }

    public function query(ShelterAddress $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('shelter-address-table')
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
            Column::make('name_of_facility'),
            Column::make('number_of_bed'),
            Column::make('type_of_housing'),
            Column::make('dwelling_houses'),
            Column::make('contact_number'),
            Column::make('service_address'),
            Column::make('zip_code'),
            Column::make('city'),
            Column::make('state'),
            Column::make('melissa_address'),
            Column::make('melissa_zip_code'),
            Column::make('melissa_city'),
            Column::make('melissa_state'),
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
        return 'ShelterAddress_' . date('YmdHis');
    }
}
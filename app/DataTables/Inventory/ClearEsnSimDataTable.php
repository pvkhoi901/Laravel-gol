<?php

namespace App\DataTables\Inventory;

use App\Models\ClearEsnSim;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClearEsnSimDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
//            ->with('user')
            ->addColumn('#', function ($record) {
                return '#';
            })->addColumn('total_record', function ($record) {
                return $record->total_record;
            })
            ->addColumn('uploaded_success', function ($record) {
                return $record->total_record;
            })
            ->addColumn('uploaded_fail', function ($record) {
                return $record->uploaded_fail;
            });
    }

    public function query(ClearEsnSim $model)
    {
        return $model->newQuery()
            ->select(DB::raw('batch, count(*) as total_record, count(CASE WHEN status=1 THEN 1 END) as uploaded_success, count(CASE WHEN status=0 THEN 1 END) as uploaded_fail'))
            ->groupBy(['batch'])
            ->orderBy('total_record');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('clear-esn-sim-table')
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
            Column::make('#'),
            Column::make('batch'),
            Column::make('total_record'),
            Column::make('uploaded_success'),
            Column::make('uploaded_fail'),
        ];
    }

    protected function filename()
    {
        return 'DisconnectionReason_' . date('YmdHis');
    }
}
<?php

namespace App\DataTables\System;

use App\Models\NoteType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class NoteTypeDataTable extends DataTable
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
            ->addColumn('status_view', function ($record) {
                return '<span
                class="badge badge-' . status_class($record['status']) . '">' . status_text($record['status']) . '</span>';
            })
            ->addColumn('action', function (NoteType $note_type) {
                return '<a href="note_type/replicate/' . $note_type->id . '" class="mr-2"><i class="fas fa-copy"></i></a>
                <a href="note_type/' . $note_type->id . '/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" data-url="note_type/delete/' . $note_type->id . '" method="GET"
                    class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i>
                </a>
                ';
            })->rawColumns(['status_view', 'action']);
    }

    public function query(NoteType $model)
    {
        return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('note_type_datatable')
            ->columns($this->getColumns())
            ->minifiedAjax(route('note_type.filter'), null,  [
                "status" => ' $("#status").val()',
            ], [])

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
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'NoteType_' . date('YmdHis');
    }
}

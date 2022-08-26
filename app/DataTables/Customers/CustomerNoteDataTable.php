<?php

namespace App\DataTables\Customers;

use App\Models\CustomerNoteType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerNoteDataTable extends DataTable
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
            ->addColumn('customer_notes_view', function (CustomerNoteType $customer_note) {

                $customer_notes = $customer_note->customer_notes;
                $elm = "";
                $length = 20;
                if (strlen($customer_notes) > $length) {
                    $customer_notes =   substr($customer_notes, 0, $length);
                    $elm = "...";
                }
                return '<a href="javascript:void(0);" data-html="true" data-toggle="tooltip" class="view_detail_note" customer_note_id="' . $customer_note->id . '"
                data-original-title="' . $customer_note->customer_notes . ' <br></a>Posted Date Time: '. Carbon::parse($customer_note->created_at)->format("d/m/Y h:i:s")  .'" >
                <strong>' . $customer_note->user->name . '</strong>
                <div class="clearfix"></div>
                <span>' . $customer_notes . $elm . '</span>
                
            </a>';
            })
            ->addColumn('date_time_view', function (CustomerNoteType $customer_note) {
                return Carbon::parse($customer_note->created_at)->format("d/m/Y H:i:s");
            })
            ->addColumn('action', function (CustomerNoteType $customer) {
                return '  
                ';
            })
            ->rawColumns(['customer_notes_view', 'action' , 'date_time_view']);
    }

    public function query(CustomerNoteType $model)
    {
        return $model->newQuery();
        // return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('customer_note_data_table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('customer_profile.filter_customer_note'), null,  [], [])
            ->orderBy(0)
            ->parameters([
                'responsive' => false,
                'autoWidth' => false
            ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('customer_notes_view')->title('Customer Notes'),
            Column::make('date_time_view')->title('Date Create'),

        ];
    }

    protected function filename()
    {
        return 'CustomerNoteProfile_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables\Customers;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class CustomerProfileDataTable extends DataTable
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

            ->addColumn('action', function (Customer $customer) {
                return ' 
                <a href="/customers/customer_profile/info/user?customer_id=' . $customer->id . '" class="mr-2">Info Customer</a>
                <a href="/customers/customer_profile/' . $customer->id . '/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" data-url="/customers/customer_profile/delete/' . $customer->id . '" method="GET"
                    class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i>
                </a>
                ';
            });
    }

    public function query(Customer $model)
    {
        return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('customer_data_table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('customer_profile.filter'), null,  [
            ], [])
            ->dom("<'row mb-3'<'col-sm-6'B><'col-sm-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row mt-3'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>")
            ->orderBy(0)
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
            Column::make('first_name')->title('First Name'),
            Column::make('middle_name')->title('Middle Name'),
            Column::make('last_name')->title('Last Name'),
            Column::make('email')->title('Email'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'CustomerProfile_' . date('YmdHis');
    }
}

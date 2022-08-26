<?php

namespace App\DataTables\Enrollment;

use App\Models\Enrollment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EnrollmentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action',function (Enrollment $enrollment){
                return '<a href="' . route('enrollment.detail', $enrollment->id) . '" class="btn btn-outline-primary">View</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Enrollment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Enrollment $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('enrollment-table')
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('enrollment_id'),
//            Column::make('status'),
            Column::make('phone_number')->title('Phone number'),
            Column::make('email'),
            Column::make('created_at')->title('Created At'),
            Column::make('first_name')->title('Full Name'),
//            Column::make('Enrollment Type')->title('Enrollment Type'),
            Column::make('dob')->title('Full Name'),
            Column::make('ssn_4')->title('SSN'),
//            Column::make('Carrier')->title('Carrier'),
            Column::make('address_1')->title('Address'),
            Column::make('state'),
            Column::make('zip_code')->title('ZipCode'),
            //Column::make('Phone Model')->title('Phone Model'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

}

<?php

namespace App\DataTables\Order;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
            ->addColumn('status', function ($record) {
                return Order::STATUS[$record->status];
            })
            ->addColumn('shipping_method', function ($record) {
                return Order::SHIPPING_METHOD[$record->shipping_method];
            })
            ->addColumn('payment_method', function ($record) {
                return Order::PAYMENT_METHOD[$record->payment_method];
            })
            ->addColumn('action', function (Order $order) {
                $action = '<div class="btn-group" role="group" aria-label="Basic example">';

                $action .= '<a href="' . route('agent-orders.show', $order->id) . '" class="btn btn-outline-primary">
                                View
                            </a>';
                $action .= '<a href="' . route('agent-orders.edit', $order->id) . '" class="btn btn-outline-primary">
                                Edit
                            </a>';
                $action .= '<a href="javascript:;" class="btn-delete btn btn-outline-primary" ata-url="' . route('agent-orders.destroy', $order->id) . '">
                                Delete
                            </a>';
                $action .= '</div>';

                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
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
            ->setTableId('agent-orders-table')
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
            Column::make('name'),
            Column::make('state'),
            Column::make('payment_method'),
            Column::make('shipping_method'),
            Column::make('agent_id')->title('Master Agent'),
            Column::make('user_id'),
            Column::make('approved_date'),
            Column::make('created_at'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Inventory-Stocks_' . date('YmdHis');
    }
}

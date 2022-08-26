<?php

namespace App\DataTables\Inventory\InventoryStock;

use App\Models\InventoryStock;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class InventoryStocksDataTable extends DataTable
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
                return InventoryStock::STATUS[$record->status];
            })
            ->addColumn('provision_kind', function ($record) {
                return InventoryStock::PROVISION_KIND[$record->provision_kind];
            })
            ->addColumn('action', function (InventoryStock $stock) {
                return '<a href="' . route('inventory-stocks.edit', $stock->id) . '" class="btn btn-outline-primary">
                            Edit
                        </a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InventoryStock $model)
    {
        return $model->newQuery()
            ->with(['product_variant', 'box', 'agent']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('products-table')
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
            Column::make('id'),
            Column::make('dec'),
            Column::make('hex'),
            Column::make('uccid_sim'),
            Column::make('mdn'),
            Column::make('product_variant.product.name')->title('Product')->orderable(false),
            Column::make('provision_kind')->title('kind')->orderable(false),
            Column::make('box.name')->title('Box name')->orderable(false),
            Column::make('msl_puk'),
            Column::make('puk_2'),
            Column::make('reason'),
            Column::make('status'),
            Column::make('note'),
            Column::make('created_at'),
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

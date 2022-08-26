<?php

namespace App\DataTables;

use App\Models\MediaImage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MediaImageDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'media_images.datatables_actions')
            ->editColumn('url_image', function (MediaImage $media_image) {
                $image = "";
                if ($media_image->url_image != "") {
                    $image = '<img src="' . $media_image->url_image . '" alt="..." class="rounded mx-auto d-block"> <br>
                    <span>' . $media_image->url_image . '</>
                    ';
                }
                return $image;
            })->rawColumns([
                'action',
                "url_image",
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MediaImage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MediaImage $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'id',
            'name',
            'url_image',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'media_images_datatable_' . time();
    }
}

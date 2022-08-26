<?php

namespace App\DataTables\SettingDatatable;

use App\Models\Languages;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Http\Request;

class LanguagesDataTable extends DataTable
{


    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addColumn('action', function (Languages $language) {
                return '<a href="' . route('languages.edit', $language->id) . '" class="btn btn-outline-primary">
                <i class="fas fa-edit"></i>Edit
                    </a>
                    <a href="' . route('languages.duplicate', $language->id) . '" class="btn btn-success">
                    <i class="far fa-copy"></i>Duplicate Language
                    </a>
                    <a href="javascript:;" data-url="languages/delete/' . $language->id . '" method="GET"
                        class="btn-delete btn btn-danger"><i class="fas fa-trash"></i>
                    </a>
                    ';
            })->addColumn('country_view', function ($language) {
                $country_code = $language->country;
                $country = COUNTRY[$language->country] ?? "";
                if ($country_code == 'vn') {
                    return '<span class="badge badge-primary">' . $country . '</span>';
                }

                if ($country_code == 'kr') {
                    return '<span class="badge badge-success">' . $country . '</span>';
                }

                if ($country_code == 'us') {
                    return '<span class="badge badge-danger">' . $country . '</span>';
                }
                return '';
            })
            ->editColumn('language_image', function (Languages $language) {
                if ($language->language_image != "") {
                    return '<img src="' . $language->language_image . '" data-toggle="lightbox" data-remote="' . $language->language_image . '" alt="..." class="img-thumbnail open-image">';
                }
                return "";
            })
            ->rawColumns(['action', 'country_view', 'language_image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Languages $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Languages $model)
    {
        return $model->filter($this->request);
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
            'id' => ['searchable' => false],
            'country_view' => ['searchable' => false],
            'language_key' => ['searchable' => false],
            'language_title' => ['searchable' => false],
            'language_image' => ['searchable' => false],
            'language_url' => ['searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'languages_datatable_' . time();
    }
}

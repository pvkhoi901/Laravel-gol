<?php

namespace App\DataTables\CrawlDataSetting;

use App\Models\WebsiteDomElement;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class WebsiteDomElementDataTable extends DataTable
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
            ->addColumn('action', function (WebsiteDomElement $topup) {
                return '  
                <a href="website_element/' . $topup->id . '/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" data-url="website_element/delete/' . $topup->id . '" method="GET"
                    class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i>
                </a>
                ';
            })
            ->rawColumns(['action']);
    }

    public function query(WebsiteDomElement $model)
    {
        return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('website_dom_element_table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('website_element.filter'), null,  [], [])
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
            Column::make('title')->title('Title'),
            Column::make('domain')->title('Host'),
            // Column::make('url')->title('Website Name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'WebsiteDomElement_' . date('YmdHis');
    }
}

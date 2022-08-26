<?php

namespace App\DataTables\CrawlDataSetting;

use App\Models\InfluencerWeek;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CrawlInfluencerDataTable extends DataTable
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
            ->addColumn('action', function (InfluencerWeek $influencer) {
                return '<a href="influencer/detail/' . $influencer->id . '" class="mr-2">Detail</a>
                <a href="javascript:;" data-url="influencer/delete/' . $influencer->id . '" method="GET"
                    class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i>
                </a>
                ';
            })->addColumn('created_at', function ($influencer) {
                return $influencer->created_at;
            })

            
            ->rawColumns( ['action' ]);
           
    }

    public function query(InfluencerWeek $model)
    {
        return  $model->filter($this->request);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('influencer_table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('influencer.filter'), null,  [
            ], [])
            ->dom("<'row mb-3'<'col-sm-6'B><'col-sm-6'f>>" .
            "<'row'<'col-sm-12'tr>>" .
            "<'row mt-3'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>")
            ->orderBy(0)
            ->buttons(
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
            Column::make('year')->title('Year'),
            Column::make('week_of_year')->title('Number Week'),
            Column::make('created_at')->title('Update Date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    protected function filename()
    {
        return 'InfluencerWeek_' . date('YmdHis');
    }
}

@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Detail Aging Inventory</h4>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 for="shipping_box">Master Agent : {{$masterAgentName}}</h4>
                        </div>
                        <div class="col-md-6" style="display: flex; justify-content: flex-end">
                            <div class="box-tools pull-right">
                                <a class="btn btn-secondary create_ticket_all" title="Create Ticket All">
                                    <span class="hidden-xs">Create Ticket All</span></a>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-line d-flex justify-content-between pt-5 pb-3" id="lineTab" role="tablist">
                        <div id="tab_item" class="d-flex">
                            @foreach($subAgentHasRMA as $agent)
                                <?php
                                $active = '';
                                if (!empty(request()->order_agent)) {
                                    $active = ( request()->order_agent == $agent->id ) ? 'active' : '' ;
                                } else {
                                    $active = $loop->first ? 'active' : '';
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link filter-status {{ $active }}" data-agent="{{ $agent->id }}"
                                       href="{{ route('Aging.detail', ['id' => $id, 'order_agent' => $agent->id]) }}">{{ $agent->full_name }}</a>
                                </li>
                            @endforeach
                        </div>
                    </ul>
                    <a class="btn btn-secondary create_ticket mt-3" title="{{ 'create ticket' }}"><i class="fa fa-paper-plane"></i></a>

                    <div class="box-body mt-3">
                        <table id="list-data" class="table table-bordered table-hover table-esn-aging">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>ESN (DEC)</th>
                                <th>ESN (HEX)</th>
                                <th>UCCID</th>
                                <th>Model</th>
                                <th>Box Name</th>
                                <th>SO#</th>
                                <th class="remaining_day">Remaining Day</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-styles')
    <style>
        table.table-bordered.dataTable th:last-child,
        table.table-bordered.dataTable th:last-child,
        table.table-bordered.dataTable td:last-child,
        table.table-bordered.dataTable td:last-child {
            border-right-width: 1px !important;
        }
        .remaining_day {
            color: red !important;
        }
        .dt-buttons {
            padding: 10px;
        }
        .sorting_1 {
            text-align: center;
        }
        .form-check-input-custom {
            width: 30px;
            height: 20px;
        }

    </style>
@endpush
@push('plugin-scripts')
    <script>
        let config = {
            id_list: $('#list-data'),
            route_filter: '{{ route('Aging.filter_list_detail') }}',
            column_array: [
                {data: 'check_box', name: 'check_box', orderable: false},
                {data: 'id', name: 'id'},
                {data: 'dec', name: 'dec'},
                {data: 'hex', name: 'hex'},
                {data: 'uccid_sim', name: 'uccid_sim'},
                {data: 'model_name', name: 'model_name'},
                {data: 'box_name', name: 'box_name'},
                {data: 'sale_order', name: 'sale_order'},
                {
                    data: "remaining_day_esn", name: 'remaining_day_esn', render: function (data, type, row) {
                        return '<div class="remaining_day">' + row.remaining_day_esn + '</div>';
                    }
                },

            ],
            params: {'order_agent': '{{request()->order_agent ?? $subAgentHasRMA->first()->orderAgent->first()->id}}'},
            id: '{{$id}}',
            route_create_ticket: '{{ route('Aging.create_ticket_from_aging') }}',
            route_return: '{{ route('Aging.index') }}',
            route_create_ticket_all: '{{ route('Aging.create_ticket_all_from_aging')  }}',
        };
    </script>
    <script src="{{ asset('js/pages/list_datatable.js') }}"></script>
    <script src="{{ asset('js/pages/rma.js') }}"></script>
@endpush



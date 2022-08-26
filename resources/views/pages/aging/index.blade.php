@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Aging Inventory Listing</h4>
                        <table id="list-data" class="table table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Master Agent</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
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
        #list-data_wrapper {
            margin-top: 50px;
        }
    </style>
@endpush
@push('plugin-scripts')
    <script>
        let config = {
            id_list: $('#list-data'),
            route_filter: '{{ route('Aging.filter_list') }}',
            column_array: [
                {data: 'id', name: 'id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'inactive_esns', name: 'inactive_esns'},
                {data: 'action', name: 'action', orderable: false},
            ],
        };
    </script>
    <script src="{{ asset('js/pages/list_datatable.js') }}"></script>
@endpush

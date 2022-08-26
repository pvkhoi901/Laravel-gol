@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">RMA LISTING</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" id="create_rma_ticket_listing" href="#" data-toggle="modal" data-target="#create_rma_ticket">
                                <i class="fas fa-plus"></i>
                                CREATE
                            </a>
                        </div>
                        <table id="list-data" class="table table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ticket Number</th>
                                <th>Mater Agent</th>
                                <th>Quantity</th>
                                <th>Committed Quantity</th>
                                <th>Updated Date</th>
                                <th>Count Down</th>
                                <th>Status</th>
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
<div class="modal fade" id="create_rma_ticket" role="dialog" aria-labelledby="create_rma_ticket" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order_agent_label" style="display: inline-block">
                    <b>Create a new RMA</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('RMA.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="user_id" class="asterisk">Select Customer</label>
                        <select class="form-control status select2" style="width: 100%;" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->full_name ?? '' }}</option>
                            @endforeach
                        </select>
                        <div class="help-block"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('plugin-styles')
    <style>
        table.table-bordered.dataTable th:last-child,
        table.table-bordered.dataTable th:last-child,
        table.table-bordered.dataTable td:last-child,
        table.table-bordered.dataTable td:last-child {
            border-right-width: 1px !important;
        }
    </style>
@endpush
@push('plugin-scripts')
    <script>
        let config = {
            id_list: $('#list-data'),
            route_filter: '{{ route('RMA.filter_list') }}',
            column_array: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'full_name', name: 'full_name'},
                {data: 'count_esn_ticket', name: 'count_esn_ticket'},
                {data: 'count_esn_return', name: 'count_esn_return'},
                {data: 'date_updated_status', name: 'date_updated_status'},
                {data: 'count_down', name: 'count_down'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false},
            ],
        };
    </script>
    <script src="{{ asset('js/pages/list_datatable.js') }}"></script>
@endpush

@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Shipment List</h4>
                        <div class="my-3 text-right"></div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('shipments.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sale Order Name</th>
                                <th>Name</th>
                                <th>Box Quantity</th>
                                <th>Phone Quantity</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {
                render: (data, type, row) => {
                    return `<a href="/order/agent-orders/${row.order.id}">${row.order.name}</a>`
                },
            },
            {
                render: (data, type, row) => {
                    return `<a href="/shipment/shipments/${row.id}">${row.name}</a>`
                },
            },
            {
                render: (data, type, row) => row.boxes_count,
            },
            {
                render: (data, type, row) => 0,
            },
            {
                render: (data, type, row) => {
                    const status = ['', 'Processing', 'Ready to Ship', 'Printed Label', 'Shipped'];
                    const color = ['', 'warning', 'primary', 'danger', 'success'];
                    return `<span class="badge badge-${color[row.status]}">${status[row.status]}</span>`
                },
            },
        ];
    </script>
@endpush

@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Shipping Boxes List</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('boxes.create') }}">
                                <i class="fas fa-plus"></i>
                                Create
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('boxes.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Sale Order Name</th>
                                <th>Tracking Number</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Dimension</th>
                                <th>Weight</th>
                                <th></th>
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
            {data: 'name', name: 'name'},
            {
                render: (data, type, row) => row.order ? row.order.name : '',
            },
            {
                render: (data, type, row) => row.tracking_number,
            },
            {
                render: (data, type, row) => row.inventory_stock_count,
            },
            {
                render: (data, type, row) => {
                    if (row.is_kitted && row.is_shipped) {
                        return `<span class='badge badge-success mr-2'>kitted</span>
                                <span class='badge badge-success mr-2'>shipped</span>`
                    } else if (row.is_kitted && !row.is_shipped) {
                        return `<span class='badge badge-success mr-2'>kitted</span>
                                <span class='badge badge-danger mr-2'>unshipped</span>`
                    } else {
                        return `<span class='badge badge-warning mr-2'>processing</span>`
                    }
                }
            },
            {
                render: (data, type, row) => row.user ? row.user.name : '',
            },
            {
                render: (data, type, row) => row.dimension,
            },
            {
                render: (data, type, row) => row.weight,
            },
            {
                render: (data, type, row) => {
                    return `<a href="/order/boxes/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="/order/boxes/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

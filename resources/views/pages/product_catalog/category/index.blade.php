@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Categories List</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('categories.create') }}">
                                <i class="fas fa-plus"></i>
                                Create
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('categories.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Parent</th>
                                <th>Type</th>
                                <th>Display website</th>
                                <th>Status</th>
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
                render: (data, type, row) => row.category ? row.category.name : '',
            },
            {
                render: (data, type, row) => row.type.toUpperCase(),
            },
            {
                render: (data, type, row) => {
                    return `<span class='badge badge-${ row.display ? 'success' : 'danger' }'>${ row.display ? 'on' : 'off' }</span>`
                }
            },
            {
                render: (data, type, row) => {
                    return `<span class='badge badge-${ row.status ? 'success' : 'danger' }'>${ row.status ? 'on' : 'off' }</span>`
                }
            },
            {
                render: (data, type, row) => {
                    return `<a href="categories/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="categories/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

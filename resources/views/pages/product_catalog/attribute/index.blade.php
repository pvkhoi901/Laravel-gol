@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Attributes List</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('attributes.create') }}">
                                <i class="fas fa-plus"></i>
                                Create
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('attributes.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
                render: (data, type, row) => {
                    return `<a href="attributes/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="attributes/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

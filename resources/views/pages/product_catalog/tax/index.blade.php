@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Taxes List</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('taxes.create') }}">
                                <i class="fas fa-plus"></i>
                                Create
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('taxes.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Value (%)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($collection as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->value }}</td>
                                <td class="text-center">
                                    <a href="{{ route('taxes.edit', $item) }}" class="mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" class="btn-delete text-danger mr-2" data-url="{{ route('taxes.destroy', $item) }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
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
            {data: 'value', name: 'value'},
            {
                render: (data, type, row) => {
                    return `<a href="taxes/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="taxes/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

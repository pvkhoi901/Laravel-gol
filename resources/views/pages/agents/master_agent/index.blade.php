@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Master Agent List</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('masters.create') }}">
                                <i class="fas fa-plus"></i>
                                Create
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('masters.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($collection as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ agent_status($item->status) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('masters.edit', $item) }}" class="mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" class="btn-delete text-danger mr-2" data-url="{{ route('masters.destroy', $item) }}"><i class="fas fa-trash"></i></a>
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
            {
                render: (data, type, row) => {
                    return `${row.firstname} ${row.lastname}`;
                },
            },
            {
                render: (data, type, row) => row.email,
            },
            {
                render: (data, type, row) => row.phone,
            },
            {
                render: (data, type, row) => {
                    return `<span class='badge badge-${ row.status ? 'success' : 'danger' }'>${ row.status ? 'on' : 'off' }</span>`
                }
            },
            {
                render: (data, type, row) => {
                    return `<a href="masters/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="masters/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

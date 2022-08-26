@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Accessories List</h4>
                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('accessories.create') }}">
                                <i class="fas fa-plus"></i>
                                Create
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('accessories.filter') }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>SKU</th>
                                <th>Model Name</th>
                                <th>Screen</th>
                                <th>Category</th>
                                <th>Data Capable</th>
                                <th>OS</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($collection as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->sku }}</td>
                                <td><b>{{ $item->brand->name ?? '' }}</b> {{ $item->model_name }}</td>
                                <td>{{ $item->screen }}</td>
                                <td>{{ $item->category->name ?? '' }}</td>
                                <td>{{ $item->data->name ?? '' }}</td>
                                <td>{{ $item->system->name ?? '' }}</td>
                                <td>${{ number_format($item->price ?? 0, 2) }}</td>
                                <td><span class="badge badge-{{ status_class($item->status) }}">{{ status_text($item->status) }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('accessories.edit', $item) }}" class="mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" class="btn-delete text-danger mr-2" data-url="{{ route('accessories.destroy', $item) }}"><i class="fas fa-trash"></i></a>
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
            {data: 'sku', name: 'sku'},
            {
                render: (data, type, row) => {
                    return `<b>${row.brand.name}</b> ${row.model_name}`
                },
            },
            {
                render: (data, type, row) => row.screen,
            },
            {
                render: (data, type, row) => row.category ? row.category.name : '',
            },
            {
                render: (data, type, row) => row.data ? row.data.name : '',
            },
            {
                render: (data, type, row) => row.system ? row.system.name : '',
            },
            {
                render: (data, type, row) => {
                    return `$ ${parseFloat(row.price).toLocaleString()}`;
                },
            },
            {
                render: (data, type, row) => {
                    return `<span class='badge badge-${ row.status ? 'success' : 'danger' }'>${ row.status ? 'on' : 'off' }</span>`
                }
            },
            {
                render: (data, type, row) => {
                    return `<a href="accessories/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="accessories/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

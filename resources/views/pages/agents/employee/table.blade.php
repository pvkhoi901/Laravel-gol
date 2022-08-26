<table id="datatable" class="table table-bordered dt-responsive nowrap" data-filter="{{ route('employees.filter', ['retailer_id' => $retailerId ?? null]) }}">
    <thead>
    <tr>
        <th>ID</th>
        <th>Master Agent</th>
        <th>Distributor</th>
        <th>Retailer</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
</table>
@push('plugin-scripts')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {
                render: (data, type, row) => {
                    return `${row.master.firstname} ${row.master.lastname}`;
                },
            },
            {
                render: (data, type, row) => {
                    return `${row.distributor.firstname} ${row.distributor.lastname}`;
                },
            },
            {
                render: (data, type, row) => {
                    return `${row.retailer.firstname} ${row.retailer.lastname}`;
                },
            },
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
                    return `<a href="/settings/employees/${row.id}/edit" class="mr-2"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" data-url="/settings/employees/${row.id}" class="btn-delete text-danger mr-2"><i class="fas fa-trash"></i></a>`
                }
            },
        ];
    </script>
@endpush

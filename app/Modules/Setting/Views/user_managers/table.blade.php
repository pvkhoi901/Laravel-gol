@push('third_party_stylesheets')
    @include('layout.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('third_party_scripts')
    @include('layout.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush
<div class="card">
    <div class="card-body">
        <div class="table-hover table-striped">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@push('plugin-scripts')
    {{ $dataTable->scripts() }}
@endpush

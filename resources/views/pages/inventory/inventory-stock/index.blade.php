@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="grid-margin">
                <h4>Inventory Stocks</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-hover table-striped">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {{ $dataTable->scripts() }}
@endpush

@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-0 header-title">Bulk Hotline</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-hover table-striped">
                                    {{$dataTable->table()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {{$dataTable->scripts()}}
@endpush
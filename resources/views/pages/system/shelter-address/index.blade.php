@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <div class="my-3 text-right">
                            <a class="btn btn-primary fs-16" href="{{ route('shelter-address.create') }}">
                                Create Shelter Address
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-0 header-title">Shelter Address</h4>
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
@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-start">
                                    <div class="col-md-7">
                                        <h4 class="mt-0 header-title">Rejection Reason</h4>
                                    </div>

                                    <div class="col-md-5 d-flex justify-content-md-end">
                                        <a class="btn btn-primary fs-16" href="{{ route('rejection-reason-category.index') }}">
                                            Rejection Category
                                        </a>
                                    </div>
                                </div>
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
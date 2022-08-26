@extends('layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">Shipping partners</h4>
                    <div class="my-3 text-right">
                        <a class="btn btn-primary fs-16" href="{{ route('shipping-partners.create') }}">
                            <i class="fas fa-plus"></i>
                            Create
                        </a>
                    </div>
                    <div class="card">
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
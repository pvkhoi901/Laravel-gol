@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">Influencer Report</h4>
                    <div class="my-3 text-right">
                         
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="table-hover table-striped">
                                        {{ $dataTable->table() }}
                                    </div>
                                </div>
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
{{ $dataTable->scripts() }}
@endpush
@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">YOUTUBE CATEGORY</h4>
                    <div class="my-3 text-right">
                        <a class="btn btn-primary fs-16" href="{{ route('category.create') }}">
                            <i class="fas fa-plus"></i>
                            Create
                        </a>
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

<div class="modal fade" id="showPopUpState" tabindex="-1" role="dialog" aria-labelledby="showPopUpStateLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showPopUpStateLabel">List State</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal_body_list_state">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
@push('plugin-scripts')
<script src="{{ mix('js/pages/category.js') }}"></script>
{{ $dataTable->scripts() }}
@endpush
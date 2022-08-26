@extends('layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">Note types</h4>
                    <div class="my-3 text-right">
                        <a class="btn btn-primary fs-16" href="{{ route('note_type.create') }}">
                            <i class="fas fa-plus"></i>
                            Create
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="display_status">Display Status</label>
                                            {{ Form::select('display_status', PLEASE_SELECT + STATUS , null, ['class' => 'form-control select2 change_search', 'id' => 'status']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="{{ mix('js/pages/note_type.js') }}"></script>
{{$dataTable->scripts()}}
@endpush
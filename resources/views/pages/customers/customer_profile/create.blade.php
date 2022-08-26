@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="">
            <h4 class="mt-0 header-title mb-3">Customer Add</h4>
            {{ Form::model($model, ['route' => ['customer_profile.store']]) }}
            @include('pages.customers.customer_profile.form', ['button' => 'Create'])
            {{ Form::close() }}
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form_note_type">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Note Type Name <span class="text-danger">*</span></label>
                                    {{ Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Name', 'required' => true , "maxlength" => 255]) }}
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes <span class="text-danger">*</span></label>
                                    {{ Form::textarea('notes', null, ['class' => 'form-control required', 'id' => 'notes', 'placeholder' => 'Note', "maxlength" => 255]) }}
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch"> 
                                        {{ Form::checkbox('status', true,$model->status == '0' ? false : true, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                                        <label class="custom-control-label pt-1" for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_new_note_type">Add Note Type</button>
            </div>
        </div>
    </div>
</div>



@endsection

@push('plugin-scripts')
<script src="{{ mix('js/pages/customer_edit.js') }}"></script>
@endpush
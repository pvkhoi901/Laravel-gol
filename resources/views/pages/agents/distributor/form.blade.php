@csrf
{{ Form::hidden('id', null) }}
<div class="row">
    <div class="grid-margin col-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h5>Personal Information</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="master-id">Master Agent <span class="text-danger">*</span></label>
                            {{ Form::select('master_id', $masters, null, ['class' => 'form-control select2 select2-ajax', 'id' => 'master-id', 'placeholder' => 'Please select', 'data-url' => route('get_masters')]) }}
                            @error('master_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                @include('pages.agents.common.basic_info')
            </div>
        </div>
    </div>
    <div class="grid-margin col-6">
        @include('pages.agents.common.action')

        @include('pages.agents.common.ach')
    </div>
</div>
@if ($button == 'Edit')
    <div class="row">
        <div class="grid-margin col-12">
            <div class="card p-3">
                <div class="card-header mb-2">
                    <h4 class="mt-0 header-title">Retailer List</h4>
                </div>
                <div class="card-box">
                    @include('pages.agents.retailer.table', ['distributorId' => $model->id])
                </div>
            </div>
        </div>
    </div>
@endif
<div class="form-group text-right">
    <a class="btn btn-secondary" href="{{ route('distributors.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>

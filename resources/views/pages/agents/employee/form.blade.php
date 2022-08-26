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
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="distributor-id">Distributor <span class="text-danger">*</span></label>
                            {{ Form::select('distributor_id', $distributors, null, ['class' => 'form-control select2', 'id' => 'distributor-id', 'data-url' => route('get_distributor_by_master'), 'placeholder' => 'Please select']) }}
                            @error('distributor_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="retailer-id">Retailer <span class="text-danger">*</span></label>
                            {{ Form::select('retailer_id', $retailers, null, ['class' => 'form-control select2', 'id' => 'retailer-id', 'data-url' => route('get_retailer_by_distributor'), 'placeholder' => 'Please select']) }}
                            @error('retailer_id')<span class="text-danger">{{ $message }}</span>@enderror
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
<div class="form-group text-right">
    <a class="btn btn-secondary" href="{{ route('employees.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>

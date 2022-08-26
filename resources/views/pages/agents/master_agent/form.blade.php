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
                    <h4 class="mt-0 header-title">Distributor List</h4>
                </div>
                <div class="card-box">
                    @include('pages.agents.distributor.table', ['masterId' => $model->id])
                </div>
            </div>
        </div>
    </div>
@endif
<div class="form-group text-right">
    <a class="btn btn-secondary" href="{{ route('masters.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>

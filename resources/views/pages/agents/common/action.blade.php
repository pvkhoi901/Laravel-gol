<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h5>Actions</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    {{ Form::select('status', \App\Models\Agent::AGENT_STATUS, null, ['class' => 'form-control select2', 'id' => 'status']) }}
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="rad_id">RAD ID</label>
                    {{ Form::text('rad_id', null, ['class' => 'form-control', 'id' => 'rad_id', 'placeholder' => 'RAD ID']) }}
                    @error('rad_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>

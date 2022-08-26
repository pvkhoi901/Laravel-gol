<div class="card mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h5>ACH Authorization</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="ach-signer">Authorized Signer Name</label>
                    {{ Form::text('ach_signer', null, ['class' => 'form-control', 'id' => 'ach-signer', 'placeholder' => 'Authorized Signer Name']) }}
                    @error('ach_signer')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="ach-fax">Fax Number</label>
                    {{ Form::text('ach_fax', null, ['class' => 'form-control', 'id' => 'ach-fax', 'placeholder' => 'Fax Number']) }}
                    @error('ach_fax')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="ach-bank-name">Bank Name</label>
                    {{ Form::text('ach_bank_name', null, ['class' => 'form-control', 'id' => 'ach-bank-name', 'placeholder' => 'Bank Name']) }}
                    @error('ach_bank_name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="ach-bank-account">Checking Account</label>
                    {{ Form::text('ach_bank_account', null, ['class' => 'form-control', 'id' => 'ach-bank-account', 'placeholder' => 'Checking Account']) }}
                    @error('ach_bank_account')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="ach-bank-routing">Routing Number</label>
                    {{ Form::text('ach_bank_routing', null, ['class' => 'form-control', 'id' => 'ach-bank-routing', 'placeholder' => 'Routing Number']) }}
                    @error('ach_bank_routing')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>

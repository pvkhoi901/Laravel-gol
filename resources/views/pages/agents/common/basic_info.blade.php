<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="firstname">Firstname <span class="text-danger">*</span></label>
            {{ Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname', 'placeholder' => 'Firstname']) }}
            @error('firstname')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="lastname">Lastname <span class="text-danger">*</span></label>
            {{ Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname', 'placeholder' => 'Lastname']) }}
            @error('lastname')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="phone">Phone <span class="text-danger">*</span></label>
            {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) }}
            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="email">Email <span class="text-danger">*</span></label>
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'autocomplete' => 'off', 'aria-autocomplete' => 'list']) }}
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="address">Address <span class="text-danger">*</span></label>
            {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) }}
            @error('address')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="apartment">Apartment</label>
            {{ Form::text('apartment', null, ['class' => 'form-control', 'id' => 'apartment', 'placeholder' => 'Apartment']) }}
            @error('apartment')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="city">City <span class="text-danger">*</span></label>
            {{ Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'City']) }}
            @error('city')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="state">State <span class="text-danger">*</span></label>
            {{ Form::text('state', null, ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'State']) }}
            @error('state')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="zip">Zip <span class="text-danger">*</span></label>
            {{ Form::text('zip', null, ['class' => 'form-control', 'id' => 'zip', 'placeholder' => 'Zip']) }}
            @error('zip')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="birthday">Birthday</label>
            {{ Form::text('birthday', null, ['class' => 'form-control datepicker', 'id' => 'birthday', 'placeholder' => 'Birthday', 'autocomplete' => 'off', 'readonly' => 'readonly']) }}
            @error('birthday')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

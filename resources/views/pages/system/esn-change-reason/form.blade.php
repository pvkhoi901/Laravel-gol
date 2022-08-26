<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @csrf

                <div class="form-group">
                    {{Form::label('reason', 'Name:', ['class' => 'required'])}}
                    {{Form::text('reason', null, ['class' => 'form-control', 'id' => 'reason', 'placeholder' => 'Enter reason']) }}
                </div>

                <div class="form-group">
                    {{Form::label('type', 'Type:', ['class' => 'required'])}}
                    {{Form::text('type', null, ['class' => 'form-control', 'id' => 'type', 'placeholder' => 'Enter type']) }}
                </div>

            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{ route('esn-change-reason.index') }}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>

        </div>
    </div>
</div>


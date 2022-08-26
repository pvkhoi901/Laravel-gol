<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    {{Form::label('reason', 'Disconnection Reason:', ['class' => 'required'])}}
                    {{Form::textarea('reason', null, ['class' => 'form-control', 'id' => 'reason', 'placeholder' => 'Enter disconnection reason', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Status:', ['class' => 'required'])}}
                    {{Form::select('status', \App\Models\DisconnectionReason::STATUS, null, ['class' => 'form-control ', 'id' => 'status', 'required' => true]) }}
                </div>
            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{ route('disconnection-reason.index') }}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>

        </div>
    </div>
</div>


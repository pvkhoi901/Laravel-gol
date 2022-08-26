<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    {{Form::label('type', 'Select Type:', ['class' => 'required'])}}
                    {{Form::select('type', \App\Models\SacCode::TYPE, null, ['class' => 'form-control ', 'id' => 'type', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{Form::label('state', 'State:', ['class' => 'required'])}}
                    {{Form::text('state', null, ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'Enter state', 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{Form::label('code', 'Code:', ['class' => 'required'])}}
                    {{Form::text('code', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Enter code', 'required' => true]) }}
                </div>
            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{ route('sac-code.index') }}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-md-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    {{Form::label('area_code', 'Area Code:', ['class' => 'required'])}}
                    {{Form::text('area_code', null, ['class' => 'form-control', 'id' => 'area_code', 'placeholder' => 'Enter area code', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{Form::label('state', 'State:', ['class' => 'required'])}}
                    {{Form::text('state', null, ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'Enter state', 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{Form::label('zip_code', 'Zip Code:', ['class' => 'required'])}}
                    {{Form::text('zip_code', null, ['class' => 'form-control', 'id' => 'zip_code', 'placeholder' => 'Enter zip code', 'required' => true]) }}
                </div>
            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{ route('area-code.index') }}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>
        </div>
    </div>
</div>


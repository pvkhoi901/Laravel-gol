<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @csrf

                <div class="form-group">
                    {{Form::label('category_id', 'Category:', ['class' => 'required'])}}
                    {{Form::select('category_id', $rejection_reason_categories, null, ['class' => 'form-control ', 'id' => 'category_id', 'required' => true])}}
                </div>

                <div class="form-group">
                    {{Form::label('name', 'Name:', ['class' => 'required'])}}
                    {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name'])}}
                </div>

                <div class="form-group">
                    {{Form::label('description', 'Description:', ['class' => 'required'])}}
                    {{Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Enter description'])}}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Status:', ['class' => 'required'])}}
                    {{Form::select('status', \App\Models\RejectionReason::STATUS, null, ['class' => 'form-control ', 'id' => 'status', 'required' => true])}}
                </div>

            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{route('rejection-reason.index')}}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>

        </div>
    </div>
</div>


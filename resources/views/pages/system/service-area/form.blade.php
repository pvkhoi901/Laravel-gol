<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    {{Form::label('company_id', 'Company Name:', ['class' => 'required'])}}
                    {{Form::select('company_id', \App\Models\ServiceArea::COMPANY, null, ['class' => 'form-control ', 'id' => 'company_id', 'required' => true])}}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Status:', ['class' => 'required'])}}
                    {{Form::select('status', \App\Models\ServiceArea::STATUS, null, ['class' => 'form-control ', 'id' => 'status', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Is Tribal:', ['class' => 'required'])}}
                    {{Form::select('is_tribal', \App\Models\ServiceArea::IS_TRIBAL, null, ['class' => 'form-control ', 'id' => 'is_tribal', 'required' => true]) }}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Zip code:', ['class' => 'required'])}}
                    {{Form::textarea('zip_code', null, ['class' => 'form-control', 'id' => 'zip_code', 'placeholder' => 'Zip code', 'required' => true]) }}
                    <span>For example 73005,62050 etc...</span>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="is_agent">Lifeline
                        {{Form::checkbox('is_agent', true, null, ['class' => 'form-control', 'id' => 'is_agent', 'required' => false])}}
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="is_nonagent">Prepaid/Postpaid
                        {{Form::checkbox('is_nonagent', true, null, ['class' => 'form-control', 'id' => 'is_nonagent', 'required' => false]) }}
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="non_agent_status">EBB
                        {{Form::checkbox('is_ebb', true, null, ['class' => 'form-control ', 'id' => 'is_ebb', 'required' => false])}}
                    </label>
                </div>

            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{ route('service-area.index') }}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>

        </div>
    </div>
</div>

@push('plugin-scripts')
    <script>
        $(function() {
            'use strict';
            $('#zip_code').tagsInput({
                'width': '100%',
                'height': '100%%',
                'interactive': true,
                'defaultText': 'Add More',
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 20,
                'placeholderColor': '#666666'
            });
        });
    </script>
@endpush

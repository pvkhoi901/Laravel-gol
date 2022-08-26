@csrf
<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">

            <div class="card-body">
                <h5 class="mb-3">Option 1 <small>(Manual input)</small></h5>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('type', 'Type:', ['class' => ''])}}
                            {{Form::select('type', \App\Models\BulkHotline::TYPE, null, ['class' => 'form-control ', 'id' => 'type', 'placeholder' => 'Please select type', 'required' => false])}}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('carrier', 'Carrier:', ['class' => ''])}}
                            {{Form::select('carrier', \App\Models\BulkHotline::CARRIER, null, ['class' => 'form-control ', 'id' => 'carrier', 'required' => false])}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('mdn', 'MDN:', ['class' => ''])}}
                    {{Form::textarea('mdn', null, ['class' => 'form-control', 'id' => 'mdn', 'required' => false]) }}
                    <small>Please Enter MDN By New Line</small>
                </div>
            </div>

            <div class="card-footer">
                <div class="form-group text-right">
                    <a class="btn btn-secondary" href="{{ route('bulk-hotline.index') }}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Option 2 <small>(Upload file CSV)</small></h4>
            </div>
            <div class="card-body">

                {{Form::file('hotline_file')}}

                <h5 class="mt-3">Header file CSV: <small>(<a href="#" target="_blank">Download Sample File</a>)</small></h5>
                <p><strong>MDN:</strong> Number (SPR/TMB)</p>
                <p><strong>Carrier:</strong> Text</p>
            </div>

            <div class="card-footer">
                <div class="form-group text-right">
                    <a class="btn btn-secondary" href="{{ route('bulk-hotline.index') }}">Cancel</a>
                    <button class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('plugin-scripts')
    <script>
        $(function () {
            'use strict';
            $('#mdn').tagsInput({
                'width': '100%',
                'height': '100%',
                'interactive': true,
                'defaultText': 'Add more ESN',
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 20,
                'placeholderColor': '#666666'
            });
        });
    </script>
@endpush
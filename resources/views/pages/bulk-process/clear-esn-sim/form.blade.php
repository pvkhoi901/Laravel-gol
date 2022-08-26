@csrf
<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">

            <div class="card-body">
                <h5>Option 1 <small>(Manual input)</small></h5>
                <div class="form-group">
                    {{Form::label('esn', 'ESN/SIM:', ['class' => 'required'])}}
                    {{Form::textarea('esn', null, ['class' => 'form-control', 'id' => 'esn', 'required' => true]) }}
                    <small>Please Enter ESN/SIM By New Line, Use standard ESN/SIM format</small>
                </div>

                <hr class="mt-5 mb-5">

                <h5>Option 2 <small>(Upload file CSV)</small></h5>

                <input type="file" class="border" id="esn_file" name="esn_file"/>
                <p class="card-description">Header: ESN/SIM (<a href="#" target="_blank">Download Sample File</a>)</p>
            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{ route('clear-esn-sim.index') }}">Cancel</a>
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
            $('#esn').tagsInput({
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
@csrf
<div class="row justify-content-md-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Upload file CSV</h4>
            </div>
            <div class="card-body">
                {{Form::file('nlad_verify_file')}}
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
                <h4>Header: <small>(<a href="#" target="_blank">Download Sample File</a>)</small></h4>
            </div>
            <div class="card-body">
                <p><strong>Company ID:</strong> Number</p>
                <p><strong>Sac:</strong> Text</p>
                <p><strong>First Name:</strong> Text</p>
                <p><strong>Last Name:</strong> Text</p>
                <p><strong>Middle Name:</strong> Text</p>
                <p><strong>Last 4 SSN:</strong> Text</p>
                <p><strong>DOB:</strong> MM/DD/YYYY</p>
                <p><strong>ieh Flag:</strong> 1/0 (Yes/No)</p>
                <p><strong>ieh Certification Date:</strong> MM/DD/YYYY</p>
                <p><strong>Primary Address1:</strong> Text</p>
                <p><strong>Primary Address2:</strong> Text</p>
                <p><strong>Primary City:</strong> Text</p>
                <p><strong>Primary State:</strong> Text</p>
                <p><strong>Primary ZIP Code:</strong> Text</p>
                <p><strong>Primary Permanent Address Flag:</strong> 1/0 (Yes/No)</p>
                <p><strong>Primary Rural Flag:</strong> 1/0 (Yes/No)</p>
                <p><strong>Eligibility Code:</strong> Text</p>
                <p><strong>Lifeline Tribal Benefit Flag:</strong> 1/0 (Yes/No)</p>
                <p><strong>Etc General Use:</strong> Text</p>
            </div>
        </div>
    </div>

</div>

@push('plugin-scripts')
    <script>
        $(function () {
            'use strict';
            $('#msn').tagsInput({
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
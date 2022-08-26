<div class="row">
    <div class="col-3">
        <label for="identity_number" class="form-label">Eligibility Effective Date:</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Save</button>
            </div>
        </div>

        <label for="identity_number" class="form-label">Eligibility Effective Date:</label>
        <div class="input-group date datepicker mb-3" id="datePickerExample">
            <input type="text" class="form-control">
            <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
        </div>

        <label for="identity_number" class="form-label">Eligibility Expire Date:</label>
        <div class="input-group date datepicker mb-3" id="datePickerExample">
            <input type="text" class="form-control">
            <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
        </div>


        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">Birth Certificate</a>
            <a href="#" class="list-group-item list-group-item-action">Certificate of Naturalization</a>
            <a href="#" class="list-group-item list-group-item-action">Certificate of US Citizenship</a>
            <a href="#" class="list-group-item list-group-item-action">Driver's License</a>
            <a href="#" class="list-group-item list-group-item-action">Military Discharge</a>
        </div>
    </div>

    <div class="col-9">

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-icon" id="rotate">
                    <i data-feather="rotate-cw"></i>
                </button>
                <button type="button" class="btn btn-primary btn-icon" id="rotate">
                    <i data-feather="zoom-in"></i>
                </button>
                <button type="button" class="btn btn-primary btn-icon" id="rotate">
                    <i data-feather="zoom-out"></i>
                </button>
            </div>

            <div id="container">
                <img class="card-img-top" id="image" src="https://images.ctfassets.net/fzn2n1nzq965/5Bf7wMBJfzdTsUETXNTNyp/a54097a7db7c75deef422cc3d2c16097/identity-us-inigo.jpg" alt="">
            </div>
        </div>

    </div>
</div>

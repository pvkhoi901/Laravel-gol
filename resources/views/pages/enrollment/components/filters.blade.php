<div class="row">
    <div class="offset-2 col-8">
        <div class="card">
            <div class="card-header">
                <div class="panel-heading">
                    <div class="text-right">
                        <button class="btn btn-lg">Reset to default</button>
                        <button class="btn btn-lg">Hide Filters</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="filter-form">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Date Range:</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="start-date" placeholder="Email">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="end-date" placeholder="Email">
                        </div>
                        <div class="col-sm-3">
                            <input type="checkbox" class="form-check-input" id="filter-all"> <span>All Orders</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order-start" class="col-sm-3 col-form-label">Order Status:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="order-start" autocomplete="off" placeholder="Pending Audit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order-state" class="col-sm-3 col-form-label">State(s):</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="order-state" autocomplete="off" placeholder="All">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order-source" class="col-sm-3 col-form-label">Source(s):</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="order-source" autocomplete="off" placeholder="All">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="enrollment-type" class="col-sm-3 col-form-label">Enrollment Type:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="enrollment-type" autocomplete="off" placeholder="All">
                        </div>
                    </div>
                    <button class="btn btn-primary me-2">Apply</button>
                </form>
            </div>
        </div>
    </div>
</div>

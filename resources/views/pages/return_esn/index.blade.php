@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Scan to Return</h4>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="shipping_box">Scan Esn to Return: (Please can ESN from actual device, not the box)</label>
                            <input type="text" class="form-control" name="esn" id="esn"/>
                        </div>
                        <div class="col-md-6" style="display: flex; justify-content: flex-end">
                            <button type="button" class="btn btn-warning" style="margin-right: 10px; height: 40px"><a style="color: black !important;" href="{{ route('Return.download_csv_template_return') }}">Download Template</a></button>
                            <input type="file" id="upload_csv_return" style="display:none" accept=".csv"/>
                            <button type="button" class="btn btn-warning" style="height: 40px" id="button_upload_return">Upload CSV File</button>
                        </div>
                    </div>
                    <div style="color: red; text-align: center; margin-top: 20px">
                        <span id="mess_warning"></span>
                    </div>
                    <form action="{{ route('Return.update_status_rma') }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <table id="list_esn_return" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ESN (DEC)</th>
                                    <th>ESN (HEX)</th>
                                    <th>UCCID</th>
                                    <th>Model</th>
                                    <th>SO#</th>
                                    <th>Defect Reason</th>
                                    <th>Defect Note</th>
                                    <th>Shipped Date</th>
                                    <th>Active</th>
                                    <th>ESN RMA Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="box-footer" style="float: right; margin-top: 20px">
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-send"></i>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card" style="margin-top: 30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <h4 for="shipping_box">Received RMA ({{ \Carbon\Carbon::today()->format('m-d-Y') }})</h4>
                        </div>
                        <div class="box-tools pull-right">
                            <span class="btn btn-secondary" style="font-size: 14px">
                                Total Phone: {{ isset($rmaCurrentReturn) ? $rmaCurrentReturn->count() : 0}}
                            </span>
                        </div>
                    </div>
                    <div style="color: red; text-align: center; margin-top: 20px">
                        <span id="mess_warning"></span>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="box-body">
                            <table id="table_esn_return_today" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>RMA#</th>
                                    <th>ESN (DEC)</th>
                                    <th>ESN (HEX)</th>
                                    <th>Model</th>
                                    <th>SO#</th>
                                    <th>Shipped Date</th>
                                    <th>Defect Reason</th>
                                    <th>Defect Note</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>RMA Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($rmaCurrentReturn))
                                        @foreach ($rmaCurrentReturn as $esn)
                                            <tr>
                                                <td>
                                                    @if (isset($esn->ticketAgent->rmaMasterTicket))
                                                        <a href="{{ route('RMA.edit', with(['RMA' => $esn->ticketAgent->rmaMasterTicket->id ])) }}" target="_blank">{{ $esn->ticketAgent->rmaMasterTicket->name }}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $esn->dec ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $esn->hex ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $esn->model_name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $esn->sale_order ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $esn->shipped_date ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $esn->defect_reason ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $esn->defect_note_custom ?? '' }}
                                                </td>
                                                <td>
                                                    @if($esn->status)
                                                        <span class="btn btn-success">USING</span>
                                                    @else
                                                        <span class="btn btn-danger">USED</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($esn->is_active)
                                                        <span class="btn btn-success">ACTIVE</span>
                                                    @else
                                                        <span class="btn btn-danger">INACTIVE</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="btn btn-success">{{ \App\Models\InventoryStock::STATUS_RMA_ESN[$esn->status_rma] ?? '' }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="check_esn_duplicate" tabindex="-1" role="dialog" aria-labelledby="order_agent" aria-hidden="true">
    <div class="modal-dialog custom-with-modal" role="document">
        <div class="modal-content custom-modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="display: inline-block">
                    <b>SELECT ESN RETURN</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="form_check_esn_duplicate">
            </div>
        </div>
    </div>
</div>
@push('plugin-styles')
    <style>
        table.table-bordered.dataTable th:last-child,
        table.table-bordered.dataTable th:last-child,
        table.table-bordered.dataTable td:last-child,
        table.table-bordered.dataTable td:last-child {
            border-right-width: 1px !important;
        }
    </style>
@endpush

@push('plugin-scripts')
    <script>
        let config = {
            routes_get_esn_input: '{{ route('Return.get_esn_return') }}',
            routes_check_csv_return: '{{ route('Return.check_file_csv_return') }}',
            auth_id: '{{ \Auth::id() }}',
        };
    </script>
    <script src="{{ asset('js/pages/rma_return.js') }}"></script>
    <script src="{{ asset('assets/plugins/csv/papaparse.min.js')}}"></script>
@endpush

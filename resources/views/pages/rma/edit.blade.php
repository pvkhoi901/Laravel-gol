@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container" style="max-width: 100% !important;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h4 class="mt-0 header-title mb-3">RMA Detail</h4>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex" style="align-items: center">
                                <h6 class="card-title mb-0">{{ $rma->name }}</h6>
                                <div class="d-flex" style="width: 100%; justify-content: flex-end">
                                    <button class="btn btn-outline-primary mr-1" type="button" {{ $rma->status == \App\Models\Rma::STATUS_COMPLETED ? 'disabled' : '' }}>
                                        Generate Labels
                                    </button>
                                    <button class="btn btn-outline-primary mr-1" type="button" id="create_label" title="Add Labels" href="#" data-toggle="modal" data-target="#create_labels" {{ $rma->status == \App\Models\Rma::STATUS_COMPLETED ? 'disabled' : '' }}>
                                        New Labels
                                    </button>
                                    <button class="btn btn-outline-primary mr-1" type="button" title="Add Aging Phones" href="#" data-toggle="modal" data-target="#add_aging_phone" {{ $rma->status == \App\Models\Rma::STATUS_COMPLETED ? 'disabled' : '' }}>
                                        Add Aging Phone
                                    </button>
                                    <button class="btn btn-outline-primary" type="button" title="Add Bad Phones" href="#" data-toggle="modal" data-target="#add_bad_phone" {{ $rma->status == \App\Models\Rma::STATUS_COMPLETED ? 'disabled' : '' }}>
                                        Add Bad Phone
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0.875rem 1.5rem;">
                            @include('pages.rma.table_label_ticket')
                        </div>
                    </div>

                    <div class="card" style="margin-top: 30px">
                        @if ($rma->ticketAgent->count())
                            <ul class="nav nav-tabs nav-tabs-line d-flex justify-content-between p-3" id="lineTab" role="tablist">
                                <div id="tab_item" class="d-flex">
                                    @foreach($rma->ticketAgent as $ticketAgent)
                                        <li class="nav-item">
                                            <a class="nav-link agent_ticket {{ $loop->first ? 'active' : '' }}" data-toggle="tab" role="tab" aria-selected="true" data-id="{{ $ticketAgent->id }}" href="javascript:;">
                                                {{ $ticketAgent->agent->full_name }}</a>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                        @endif
                        <div style="padding: 0.875rem 1.5rem;">
                            @include('pages.rma.esn_ticket_table')
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="btn-group dropleft btn-block">
                                <button type="button" class="btn btn-{{ \App\Models\Rma::STATUS_COLOR[$rma->status] }} dropdown-toggle btn-block"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ \App\Models\Rma::STATUS[$rma->status] }}
                                </button>
                                @if($rma->status != \App\Models\Rma::STATUS_COMPLETED)
                                <div class="dropdown-menu">
                                    @foreach (\App\Models\Rma::STATUS as $key => $status)
                                        <a class="dropdown-item" href="{{ route('RMA.update_status', ['rma_id' => $rma->id, 'status' => $key]) }}">{{ $status }}</a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body text-center">
                            <h6 class="font-weight-medium">{{ $rma->name }}</h6>
                            <p>- for -</p>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                </span>{{ $rma->agent->fullname }}
                            </h6>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    Assigned to:
                                </span>{{ $rma->agent->fullname }}
                            </h6>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    Date:
                                </span>{{ $rma->created_at->format('Y-m-d') }}
                            </h6>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">RMA Device Requested</h6>
                            </div>
                        </div>
                        <div style="padding: 0.875rem 1.5rem;" id="rma-device-list">
                            @if ($rma->ticketAgent->count())
                                @include('pages.rma.list_device_requested', ['listDevice' => $rma->ticketAgent->first()->esnTicket])
                            @else
                                <div style="text-align: center">NO DATA</div>
                            @endif
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Latest Activity</h6>
                            </div>
                        </div>
                        <div style="padding: 0.875rem 1.5rem;" id="rma-note-list" data-ticket-agent-id="{{ $rma->ticketAgent->first()->id ?? null }}">
                            @if ($rma->ticketAgent->count())
                                @include('pages.rma.list_note_detail', [
                                    'listNote' => $rma->ticketAgent->first()->noteTicket,
                                    'ticketAgentId' => $rma->ticketAgent->first()->id
                                ])
                            @else
                                <div style="text-align: center">NO DATA</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="create_labels" tabindex="-1" role="dialog" aria-labelledby="order_agent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order_agent_label" style="display: inline-block">
                    <b>New Labels</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form style="margin: 0">
                    @csrf
                    <div class="form-group form-group-custom">
                        <label for="sender_name">Sender Name</label>
                        <input type="text" id="sender_name" name="sender_name" class="form-control" value="">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group form-group-custom">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" autocomplete="off">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label for="address_2">Address 2</label>
                        <input type="text" id="address_2" name="address_2" class="form-control">
                        <div class="help-block"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-custom">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-control">
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-custom">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control">
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-custom">
                        <label for="zip_code">Zipcode</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="">
                        <div class="help-block"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group-custom">
                            <label for="number_labels">Number Labels</label>
                            <input type="text" id="number_labels" name="number_labels" class="form-control" value="">
                            <div class="help-block"></div>
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label for="dimensions">Dimensions</label>
                            <input type="text" id="dimensions" name="dimensions" class="form-control" value="">
                            <div style="color: red; font-size: 13px" >Note : For example ( 13x13x13 )</div>
                            <div class="help-block"></div>
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label for="weight">Weight per Box</label>
                            <input type="text" id="weight" name="weight" class="form-control" value="">
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <input type="hidden" name="ticket_id" value="{{ $rma->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary" id="create_label_submit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_tracking" tabindex="-1" role="dialog" aria-labelledby="order_agent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order_agent_label" style="display: inline-block">
                    <b>Tracking Number</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="form_add_tracking">
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-bad-phone" id="add_bad_phone" tabindex="-1" role="dialog" aria-labelledby="add_bad_phone" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="display: inline-block">
                    <b style="font-size: 15px">Return Merchandise Authorization ( RMA )<br>
                        Master: {{ $rma->agent->fullname }}
                    </b>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_item">
                    <div class="form-group">
                        <label for="esn">ESN: (Please scan ESN from actual device, not the box)</label>
                        <input type="text" id="esn" name="esn" class="form-control">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label for="id_code_explain">Acceptable Defect Reason: </label>
                        <select class="form-control status select2" style="width: 100%;" name="id_code_explain" id="id_code_explain">
                            @foreach ($codeExplain as $k => $v)
                                <option value="{{ $k }}">{{ $v}}</option>
                            @endforeach
                        </select>
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label for="note_defect">Defect note: </label>
                        <input type="text" id="note_defect_req" name="note_defect_req" class="form-control" disabled>
                        <div class="help-block"></div>
                    </div>
                </form>
                <div class="form-group">
                    <button type="button" class="btn btn-warning" id="add_bad_phone_form">Add item to RMA</button>
                </div>
                <form style="margin-bottom: 0px;">
                    <div class="row" style="display: flex; align-items: center; ">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="csv_file">Upload CSV file for multiple items: </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input custom-file-input-bad" id="input_up_csv" accept=".csv">
                                    <label class="custom-file-label custom-file-label-bad" for="input_up_csv">Upload CSV File Bad Phone</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" id="upload_file_csv" style="margin-top: 10px">Upload</button>
                    </div>
                </form>

                <a href="{{ route('RMA.download_csv_template') }}">Download the CSV Template</a>

                <div style="color: red; text-align: center; margin-top: 20px">
                    <span id="mess_warning"></span>
                </div>

                <section id="bad_phone_list" class="table-list" style="margin-top: 20px">
                    @include('pages.rma.list_add_bad_phone')
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary" id="add_bad_phone_submit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-bad-phone" id="add_aging_phone" tabindex="-1" role="dialog" aria-labelledby="add_bad_phone" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="display: inline-block">
                    <b style="font-size: 15px">Return Merchandise Authorization ( RMA )<br>
                        Master: {{ $rma->agent->fullname }}
                    </b>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_item">
                    <div class="form-group">
                        <label for="esn_aging">ESN: (Please scan ESN from actual device, not the box)</label>
                        <input type="text" id="esn_aging" name="esn_aging" class="form-control">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label for="id_code_explain_aging">Acceptable Defect Reason: </label>
                        <select class="form-control status select2" style="width: 100%;" name="id_code_explain_aging" id="id_code_explain_aging">
                            <option value="">Aging</option>
                        </select>
                        <div class="help-block"></div>
                    </div>
                </form>
                <div class="form-group">
                    <button type="button" class="btn btn-warning" id="add_aging_phone_form">Add item to RMA</button>
                </div>
                <form style="margin-bottom: 0px;">
                    <div class="row" style="display: flex; align-items: center; ">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="csv_file">Upload CSV file for multiple items: </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input custom-file-input-aging" id="input_up_csv_aging" accept=".csv">
                                    <label class="custom-file-label custom-file-label-aging" for="input_up_csv">Upload CSV File Aging Phone</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" id="upload_file_csv_aging" style="margin-top: 10px">Upload</button>
                    </div>
                </form>

                <a href="{{ route('RMA.download_csv_template_aging') }}">Download the CSV Template</a>

                <div style="color: red; text-align: center; margin-top: 20px">
                    <span id="mess_warning_aging"></span>
                </div>
                <form action="{{ route('RMA.add_aging_ticket') }}" method="POST">
                    @csrf
                    <section class="table-list" style="margin-top: 20px">
                        @include('pages.rma.list_add_aging_phone')
                    </section>
                    <input type="hidden" value="{{ $rma->id }}" name="ticket_rma">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary" id="add_aging_phone_submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{!! $notes !!}

@push('plugin-styles')
    <link href="{{ asset('css/rma.css') }}" rel="stylesheet" />
@endpush

@push('plugin-scripts')
    <script>
        let config = {
            routes_create_label: '{{ route('RMA.create_labels', with(['rma_id' => $rma->id])) }}',
            routes_delete_label: '{{ route('RMA.delete_label') }}',
            routes_modal_tracking: '{{ route('RMA.modal_tracking') }}',
            routes_add_note_ticket: '{{ route('RMA.add_note_ticket')}}',
            routes_add_single_bad_phone: '{{ route('RMA.check_bad_phone')}}',
            routes_submit_bad_phone_form: '{{ route('RMA.add_bad_phone_form')}}',
            routes_get_defect_note: '{{ route('RMA.get_defect_note')}}',
            routes_filter_labels_ticket: '{{ route('RMA.filter_esn_ticket', with(['ticket_id' => $rma->id])) }}',
            routes_get_ticket_agent: '{{ route('RMA.get_ticket_agent')}}',
            routes_check_file_csv_bad: '{{ route('RMA.check_file_csv')}}',
            routes_check_aging_phone_single: '{{ route('RMA.check_aging_phone') }}',
            routes_check_aging_phone_csv: '{{ route('RMA.check_file_csv_aging') }}',
            auth_id: '{{ \Auth::id() }}',
            agent_id: '{{ $rma->agent->id ?? '' }}',
            rma_id: '{{ $rma->id ?? '' }}',
        };
    </script>
    <script src="{{ asset('js/pages/rma.js') }}"></script>
    <script src="{{ asset('assets/plugins/csv/papaparse.min.js')}}"></script>
@endpush

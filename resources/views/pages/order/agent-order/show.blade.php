@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-baseline">
                <h4 class="mt-0 header-title mb-3">Agent Order Detail</h4>
                <a href="{{ route('agent-orders.edit', $order->id) }}" class="btn btn-outline-primary" type="button">
                    Edit Order
                </a>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">{{ $order->name }}</h6>
                                <button class="btn btn-outline-primary" id="create-shipment" type="button" data-url="{{ route('shipments.store') }}" data-order="{{ $order->id }}">
                                    New Shipment
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('pages.order.agent-order.components.shipment')
                            <div class="form-group row">
                                <label for="shipment" class="col-sm-3 col-form-label">Assign to Shipment</label>
                                <div class="col-sm-8">
                                    {{ Form::select('shipment', $shipments ?? [], null, ['id' => 'shipment-id', 'class' => 'form-control select2', 'placeholder' => 'Select']) }}
                                    <span class="text-danger" id="shipment-id-error"></span>
                                </div>
                                <div class="col-sm-1">
                                    <a class="btn btn-outline-success" id="shipment-id-transfer" href="javascript:;" data-url="{{ route('shipments.transfer.box') }}">
                                        <i class="fa fa-random"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="order" class="col-sm-3 col-form-label">Assign to Other Orders</label>
                                <div class="col-sm-8">
                                    {{ Form::select('order', $orders, null, ['id' => 'order', 'class' => 'form-control select2', 'placeholder' => 'Select']) }}
                                    <br>
                                    <br>
                                    {{ Form::select('agent', [], null, ['class' => 'form-control select2', 'placeholder' => 'Select', 'id' => 'order-agent', 'data-url' => route('get_order_agent_by_order')]) }}
                                    <span class="text-danger" id="order-agent-id-error"></span>
                                </div>
                                <div class="col-sm-1 d-flex align-items-center">
                                    <a class="btn btn-outline-success" id="order-agent-id-transfer" href="javascript:;"  data-url="{{ route('agent_order_agents.transfer.box') }}">
                                        <i class="fa fa-random"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('pages.order.agent-order.components.shipping_box')
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="btn-group dropleft btn-block">
                                <button type="button"
                                    class="btn btn-{{ \App\Models\Order::STATUS_COLOR[$order->status] }} dropdown-toggle btn-block"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ \App\Models\Order::STATUS[$order->status] }}
                                </button>
                                <div class="dropdown-menu">
                                    @foreach (\App\Models\Order::STATUS as $key => $status)
                                        <a class="dropdown-item"
                                            href="{{ route('agent-orders.update_status', ['order_id' => $order->id, 'status' => $key]) }}">{{ $status }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h6 class="font-weight-medium text-center">{{ $order->name }}</h6>
                            <p class="text-center">- for -</p>
                            <div class="row">
                                <div class="col-6 text-right"><span class="text-muted">Created by:</span></div>
                                <div class="col-6">{{ $order->agent->fullname }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-right"><span class="text-muted">Assigned to:</span></div>
                                <div class="col-6">{{ $order->agent->fullname }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-right"><span class="text-muted">Created At:</span></div>
                                <div class="col-6">{{ $order->created_at->format('Y-m-d') }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-right"><span class="text-muted">State:</span></div>
                                <div class="col-6">{{ $order->state }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-right"><span class="text-muted">Shipping Method:</span></div>
                                <div class="col-6">{{ \App\Models\Order::SHIPPING_METHOD[$order->shipping_method] }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-right">
                                    <span class="text-muted">SO Quickbook:</span>
                                    @php($quickbook = $order->getFirstMedia('quickbook'))
                                </div>
                                <div class="col-6">
                                    <a href="javascript:;" onclick="document.getElementById('quickbook').click(); return false">
                                        @if(empty($quickbook)) New @else Edit @endif
                                    </a>
                                    {{ Form::file('quickbook', ['class' => 'd-none', 'id' => 'quickbook', 'accept' => 'application/pdf', 'data-url' => route('agent-orders.quickbook.upload', $order)]) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    @if (!empty($quickbook))
                                        <div>
                                            <a href="{{ $quickbook->getFullUrl() }}" target="_blank">{{ $quickbook->file_name }}</a>
                                        </div>
                                    @endif
                                </div></div>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-right">
                                    <span class="text-muted">Invoice:</span>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:;" onclick="document.getElementById('invoice').click(); return false">New</a>
                                    {{ Form::file('invoice', ['class' => 'd-none', 'id' => 'invoice', 'accept' => 'application/pdf', 'data-url' => route('agent-orders.invoice.upload', $order)]) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    @foreach ($order->getMedia('invoice') as $invoice)
                                        <div>
                                            <a href="{{ $invoice->getFullUrl() }}" target="_blank">{{ $invoice->file_name }}</a>
                                            <a href="javascript:;" data-url="{{ route('invoices.delete', $invoice) }}" class="delete-invoice text-danger">&nbsp;<i class="fas fa-times"></i></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div id="order-phone">
                        @include('pages.order.agent-order.components.order_product', ['order_agent' => $order->order_agents->first()])
                        </div>
                        <div id="order-note">
                        @include('pages.order.agent-order.components.note', ['order_agent' => $order->order_agents->first()])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.order.agent-order.components.modal_notes')
@endsection

@push('plugin-styles')
@endpush

@push('plugin-scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2-Egmmh6e_7KnocDCGJEgrTifAFTJjUE&libraries=places&region=US">
    </script>
    <script src="{{ mix('js/pages/agent-order.js') }}"></script>
@endpush

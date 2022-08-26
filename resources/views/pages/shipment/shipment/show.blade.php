@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-baseline">
                <h4 class="mt-0 header-title mb-3">Shipment Detail</h4>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Shipment Number: {{ $model->name }}</h6>
                                <a href="{{ route('boxes.create', ['shipment_id' => $model->id]) }}" class="btn btn-outline-primary" type="button">
                                    Create box
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            @include('pages.shipment.shipment.components.boxes')
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="btn-group dropleft btn-block">
                                <button type="button" class="btn btn-{{ \App\Models\Shipment::STATUS_COLOR[$model->status] }} dropdown-toggle btn-block"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ \App\Models\Shipment::STATUS[$model->status] }}
                                </button>
                                <div class="dropdown-menu">
                                    @foreach (\App\Models\Shipment::STATUS as $key => $status)
                                        <a class="dropdown-item" href="{{ route('shipments.update_status', ['shipment' => $model->id, 'status' => $key]) }}">{{ $status }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body text-center">
                            <h6 class="font-weight-medium">{{ $model->name }}</h6>
                            <p>- for -</p>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    Created by:
                                </span>{{ $model->order->agent->fullname }}
                            </h6>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    Assigned to:
                                </span>{{ $model->order->agent->fullname }}
                            </h6>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    Created At:
                                </span>{{ $model->created_at->format('Y-m-d') }}
                            </h6>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    State:
                                </span>{{ $model->order->state }}
                            </h6>
                            <h6 class="mt-2 font-weight-normal">
                                <span class="text-muted">
                                    Shipping Method:
                                </span>{{ \App\Models\Order::SHIPPING_METHOD[$model->order->shipping_method] }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-styles')
@endpush

@push('plugin-scripts')
    <script src="{{ mix('js/pages/shipment.js') }}"></script>
@endpush

<div class="card mt-4">
    <div>
        <ul class="nav nav-tabs nav-tabs-line d-flex justify-content-between p-3" id="lineTab" role="tablist" data-url="{{ route('order_agents.tab') }}">
            <div id="tab_item" class="d-flex">
                @foreach ($order->order_agents as $order_agent)
                    <li class="nav-item">
                        <a class="nav-link @if ($loop->first) active @endif" id="order-agent-{{ $loop->index }}" data-order-agent-id="{{ $order_agent->id }}" href="javascript:;">{{ $order_agent->attention_name }}</a>
                    </li>
                @endforeach
            </div>
            <button class="create-order-agent btn btn-outline-primary btn-icon float-right" data-toggle="modal" data-target="#agentOrderModal" data-url="{{ route('agent-order-agents.store') }}">
                <i data-feather="plus"></i>
            </button>
        </ul>
        <div class="tab-content card-body" id="lineTabContent">
            @if (!empty($order->order_agents->first()))
                @include('pages.order.agent-order.components.order_agent_tab', ['order_agent' => $order->order_agents->first()])
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="agentOrderModal" tabindex="-1" aria-labelledby="agentOrderModalTitle"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agentOrderModalTitle">Add Order Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['url' => route('agent-order-agents.store'), 'class' => 'validate']) !!}
            <div class="modal-body">
                {{ Form::hidden('order_id', $order->id) }}
                {{ Form::hidden('_method', 'post') }}
                <div class="form-group">
                    {{ Form::label('agent_id', null, ['class' => 'control-label required']) }}
                    {{ Form::select('agent_id', $agents, null, ['class' => 'select2', 'placeholder' => 'Select Agent', 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('company_name', null, ['class' => 'control-label required']) }}
                    {{ Form::text('company_name', null, ['class' => 'form-control form-control-lg', 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('attention_name', null, ['class' => 'control-label required']) }}
                    {{ Form::text('attention_name', null, ['class' => 'form-control form-control-lg', 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('shipping_address', null, ['class' => 'control-label required']) }}
                    {{ Form::text('shipping_address', null, ['class' => 'form-control form-control-lg', 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('shipping_address_2', null, ['class' => 'control-label']) }}
                    {{ Form::text('shipping_address_2', null, ['class' => 'form-control form-control-lg']) }}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('city', null, ['class' => 'control-label required']) }}
                            {{ Form::text('city', null, ['class' => 'form-control form-control-lg', 'required' => true]) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('state', null, ['class' => 'control-label required']) }}
                            {{ Form::text('state', null, ['class' => 'form-control form-control-lg', 'minlength' => 2, 'maxlength' => 2, 'required' => true]) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('zipcode', null, ['class' => 'control-label required']) }}
                            {{ Form::number('zipcode', null, ['class' => 'form-control form-control-lg', 'minlength' => 5, 'maxlength' => 5, 'required' => true]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                {{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

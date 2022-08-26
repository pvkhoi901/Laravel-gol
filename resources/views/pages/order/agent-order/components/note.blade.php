@if (!empty($order_agent))
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-baseline">
            <h6 class="card-title mb-0">Order Note</h6>
        </div>
    </div>
    <div class="card-body">
        @foreach ($order_agent->notes as $note)
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <p class="font-italic">{{ $note->created_at->format('m/d/Y H:i A') }}</p>
                    <p>{{ $note->content }}</p>
                    <p class="text-right">{{ $note->user->name }}</p>
                </div>
            </div>
        </div>
        @endforeach
        {!! Form::open(['url' => [route('agent-order-notes.store')], 'method' => 'post']) !!}
        <div class="form-group">
            {{ Form::hidden('order_agent_id', $order_agent->id) }}
            {{ Form::textArea('content', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Note']) }}
        </div>
        <div class="form-group text-right">
            {{ Form::submit('Add note', ['class' => 'btn btn-outline-primary']) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endif

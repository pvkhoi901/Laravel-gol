@if (count($order->order_agents))
<div class="modal fade" id="modal-note" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($order->order_agents as $order_agent)
                    @if ($loop->index % 2 == 0)
                        <div class="row">
                    @endif
                        <div class="col-6 pb-3">
                            <div class="card border-right-0 border-bottom-0 border-left-0 border-top border-success">
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col-6">{{ $order_agent->attention_name }}</div>
                                            <div class="col-6 text-right">
                                                <a class="collapse-note" data-toggle="collapse" href="#order-agent-{{ $order_agent->id }}-note" aria-expanded="true">
                                                    <i class="fas fa-minus"></i>
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-text collapse show" id="order-agent-{{ $order_agent->id }}-note">
                                        @foreach ($order_agent->notes as $note)
                                            <div class="row">
                                                <div class="col-6 font-weight-bold">{{ $note->user->name }}</div>
                                                <div class="col-6">{{ $note->created_at->format('m/d/Y H:i A') }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">{{ $note->content }}</div>
                                            </div>
                                            @if (!$loop->last)<hr>@endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @if ($loop->index % 2 != 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@forelse($listNote as $note)
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 10px; font-style: italic;">
                    {{ date('d/m/Y', strtotime($note->created_at))  }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    {{ date('g:i A', strtotime($note->created_at))  }}
                </div>
                <div class="col-md-9">
                    {{ $note->content }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: right">
                    {{ $note->createdBy->name }}
                </div>
            </div>
        </div>
    </div>
@empty
    <div style="text-align: center">NO DATA</div>
@endforelse
<div class="row">
    <div class="col-md-8">
        <input type="text" class="form-control" placeholder="Add a note" id="add_note"/>
    </div>
    <div class="col-md-4" style="text-align: right">
        <button class="btn btn-primary" id="add_note_btn" data-ticket-agent-id="{{ $ticketAgentId }}">ADD NOTE</button>
    </div>
</div>

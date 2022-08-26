<div class="modal fade" id="modal-note">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ticket Notes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($rmaTicket as $item)
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <div class="user-block">
                                        <span class="username">
                                            <a href="#">{{ $item->agent->full_name }}</a>
                                        </span>
                                    </div>
                                    <div class="box-tools">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-footer box-comments">
                                    @foreach ($item->noteTicket as $note)
                                        <div class="box-comment">
                                            <div class="comment-text">
                                                <span class="username">
                                                    {{ $note->createdBy->name }}
                                                    <span
                                                        class="text-muted pull-right">{{ $note->created_at->format('m/d/Y h:i A') }}</span>
                                                </span>
                                                {{ $note->content }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .user-block .username,
    .user-block .description,
    .user-block .comment,
    .box-comments .comment-text {
        margin: 0 !important;
    }

</style>

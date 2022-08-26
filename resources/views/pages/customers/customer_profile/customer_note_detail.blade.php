<div class="modal-body">
    <table border="0" class="table table-hover table-bordered">
        <tbody>
            <tr>
                <td width="30">Customer ID </td>
                <td width="1">
                    <center>:</center>
                </td>
                <td width="69">{{$customer_note->customer_id}}</td>
            </tr>
            <tr>
                <td>Notes </td>
                <td>
                    <center>:</center>
                </td>
                <td class="cutomer_notes_text">
                    {{$customer_note->customer_notes}}
                </td>
            </tr>
            <tr>
                <td>Notes Type </td>
                <td>
                    <center>:</center>
                </td>
                <td>
                    {{$customer_note->note->name}}
                </td>
            </tr>
            <tr>
                <td>Priority </td>
                <td>
                    <center>:</center>
                </td>
                <td>
                    {{ Form::select('priority_type', \App\Models\Customers::PRIORITY, $customer_note->priority, ['class' => 'form-control select2', 'id' => 'priority_type' , "style" => "width : 100%"]) }}
                </td>
            </tr>
            <tr>
                <td>Posted By </td>
                <td>
                    <center>:</center>
                </td>
                <td>{{$customer_note->user->name}}</td>
            </tr>

            <tr>
                <td>Posted DateTime </td>
                <td>
                    <center>:</center>
                </td>
                <td>
                    <span data-toggle="tooltip" data-original-title="2021-03-Oct" data-placement="top">
                        {{$customer_note->created_at}}</span></td>
            </tr>
            <tr>
                <td>Caller ID</td>
                <td>
                    <center>:</center>
                </td>
                <td>{{$customer_note->carrier_id}}</td>
            </tr>
        </tbody>
    </table>
    <div class="modal-footer">
        <button class="btn btn-info pull-left mark-void-unvoid bg-red" id="modal-footer16251" data-id="16251"
            data-void="N" type="button">Mark Void (PC248)</button> 
    </div>
</div>
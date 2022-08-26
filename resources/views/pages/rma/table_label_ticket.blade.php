<table class="table table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>Sender Name</th>
        <th>Address</th>
        <th># of Labels</th>
        <th>Dimensions</th>
        <th>Weight per Box</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if($rma->ticketLabels->isNotEmpty())
    @foreach($rma->ticketLabels as $item)
        <tr>
            <td>{{ $item->sender_name ?? '' }}</td>
            <td>{{ $item->address_custom ?? '' }}</td>
            <td>{{ $item->number_labels ?? '' }}</td>
            <td>{{ $item->dimensions ?? '' }}</td>
            <td>{{ $item->weight ? $item->weight.'lbs' : '' }}</td>
            <td>
                <a id="delete_label" href="#" data-id="{{ $item->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                <a id="add_tracking" href="#" title="Tracking Number" data-id="{{ $item->id }}" data-number-labels="{{ $item->number_labels }}"
                   class="btn btn-success btn-sm add_tracking" data-toggle="modal" data-target="#edit_tracking"><i class="fa fa-truck"></i></a>
                <a href="" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>

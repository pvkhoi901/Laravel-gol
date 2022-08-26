<table id="datatable_customer_notes" class="table table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Note</th>
            <th>Date Create</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customer_notes as $customer_note)
        <tr>
            <td>
                <a href="javascript:void(0);" data-html="true" data-toggle="tooltip"
                    data-original-title="{{$customer_note->customer_notes}} <br></a>Posted Date Time: {{$customer_note->created_at}}"
                    id="exampleModaltext16251">
                    <strong>{{$customer_note->user->name}}</strong>
                    <div class="clearfix"></div>
                    {{$customer_note->customer_notes}}
                </a>
            </td>
            <td>
                <span class="badge bg-green cust_span" data-toggle="tooltip" data-original-title="2021-03-Oct"
                    data-placement="top" aria-describedby="tooltip647429">
                    11:18 AM </span>
                <div class="tooltip fade top" role="tooltip" id="tooltip647429"
                    style="top: 95.25px; left: 496.25px; display: block;">
                    <div class="tooltip-arrow" style="left: 50%;"></div>
                    <div class="tooltip-inner">2021-03-Oct</div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
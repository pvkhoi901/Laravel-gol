<div class="order-history-tab">
    <div class="table-responsive">
        <table class="table ohtable">
            <thead>
            <tr class="order_head">
                <th>Note</th>
                <th>Event</th>
                <th>Note Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enrollment_nlad_histories as $history)
                <tr class="custome_cborder">
                    <td>{{$history->comment}}</td>
                    <td>{{$history->event}}</td>
                    <td>{{$history->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

{{--    <div class="box-footer clearfix">--}}
{{--        <nav aria-label="Page navigation example" class="">--}}
{{--            <ul class="pagination pull-right">--}}
{{--                <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}

</div>

<style>
    table.ohtable {
        background-color: transparent;
        border-collapse: separate;
        border-spacing: 0 1em;
    }

    table.ohtable thead tr.order_head {
        background: #f2f2f2 !important;
        color: #262626 !important;
        font-size: 16px !important;

    }

    table.ohtable tr td {
        border: 1px solid #e9e9e9 !important;
        border-collapse: collapse;
        padding: 10px 10px;
        font-size: 15px;
    }

    .order-history-tab {
        padding: 5px;
    }
</style>

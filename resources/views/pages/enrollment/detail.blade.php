@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="grid-margin">
                <h4>REVIEW LIFELINE ORDER - ACT4692</h4>
            </div>
            @include('pages.enrollment.components.detail.list-card-info')
            @include('pages.enrollment.components.detail.list-order-tabs')
            @include('pages.enrollment.components.detail.list-actions')
        </div>
    </div>
@endsection

<script>
    window.onload = function(e){
        $('#enrollments-table').DataTable({
            processing: true,
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    }

</script>

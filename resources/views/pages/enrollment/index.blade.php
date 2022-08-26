@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="grid-margin">
                <h4>All Enrollments </h4>
            </div>
    @include('pages.enrollment.components.filters')
            <br>
    @include('pages.enrollment.components.data-tables')
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

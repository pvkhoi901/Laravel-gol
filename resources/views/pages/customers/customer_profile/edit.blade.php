@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h4 class="mt-0 header-title mb-3">Customer Edit</h4>
        {{ Form::model($model, ['route' => ['customer_profile.update', $model], 'method' => 'put']) }}
        @include('pages.customers.customer_profile.form', ['button' => 'Edit'])
        {{ Form::close() }}
    </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        ...
      </div>
    </div>
  </div>
  
@endsection


@push('plugin-styles')
@endpush

@push('plugin-scripts')
<script src="{{ mix('js/pages/plans_edit.js') }}"></script>
@endpush
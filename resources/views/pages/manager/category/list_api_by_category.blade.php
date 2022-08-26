@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="my-3 text-right">
                        <a class="btn btn-primary" href="/managerapi/api_detail/create" role="button">Add New Api</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">

                                                    @foreach($categories as $key => $category)
                                                    <div class="resourceActions">
                                                        <div class="action post">
                                                            <!-- Invitation -->
                                                            <div class="actionInvitation post">
                                                                <a href="javascript:;" category_id="{{$category->id}}" class="actionInvitationRow goto_category_api">
                                                                    <div class="actionTag post"></div>
                                                                    <!-- Name -->
                                                                    <h4 class="actionName">
                                                                        {{$category->name}} </h4>
                                                                    <!-- /Name -->
                                                                    <!-- Icon -->
                                                                    <div class="actionInvitationIcon"></div>
                                                                    <!-- /Icon -->
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-3 div_list_cateogry">
                                                    @foreach($apis as $key => $api)

                                                    <div class="resourceActions">
                                                        <div class="action post">
                                                            <!-- Invitation -->
                                                            <div class="actionInvitation post">
                                                                <a href="javascript:;" api_id="{{$api->id}}" class="actionInvitationRow goto_detail_api">
                                                                    <div class="actionTag post"></div>
                                                                    <!-- Name -->
                                                                    <h4 class="actionName">
                                                                        {{$api->name}} </h4>
                                                                    <!-- /Name -->
                                                                    <!-- Icon -->
                                                                    <div class="actionInvitationIcon"></div>
                                                                    <!-- /Icon -->
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                                <div class="col-md-7 detail_api_seach">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('plugin-styles')
<link href="{{ asset('assets/css/form/list_api.css?').time() }}" rel="stylesheet">
<style>
    .machineColumnContents {
        transform: none !important;
    }

    .machineColumnDestination div {
        margin-left: 20px !important;
    }

    .parametersList,
    .machineColumnTitleText,
    .parametersTitle {
        margin-left: 20px !important;
    }

</style>
@endpush

@push('plugin-scripts')
<script src="{{ mix('js/pages/category_api.js') }}"></script>
@endpush

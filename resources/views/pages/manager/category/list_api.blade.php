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

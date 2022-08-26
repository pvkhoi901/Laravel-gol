<div class="row machineColumnContents customScrollbar customScrollbarMachineColumn">

    <div class=" col-md-12   ">
        <!-- Breadcrumbs -->
        <div class="row machineColumnBreadcrumbsContainer">
            <div class="col-md-12">
                <div class="row machineColumnBreadcrumbs">
                    <div class="machineColumnBreadcrumbLine">
                        <!-- Resource Group -->
                        <!-- /Resource Group -->
                        <!-- Resource -->
                        <a href="javascript:;" class="machineColumnBreadcrumb machineColumnResourceName">
                            {{$detail->getCategory->name ?? ""}} </a>
                        <span class="machineColumnBreadcrumbsSlash">/</span>
                        <!-- /Resource -->
                        <!-- Action -->
                        <a href="/managerapi/api_detail/{{$detail->id ?? "0"}}/edit" class="machineColumnBreadcrumb machineColumnActionName">
                            {{$detail->name ?? ""}} </a>
                        <!-- /Action -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /Breadcrumbs -->
        <!-- Destination -->
        <div class="row machineColumnDestination">
            <div class="destination">
                <!-- HTTP Method --><span class="destinationMethod post">{{$detail->api_type ?? ""}}</span><!-- /HTTP Method -->
                <!-- Host --><span class="destinationHost">{{$detail->api_url ?? ""}}</span><!-- /Host -->
            </div>
        </div>
        <!-- /Destination -->
        <!-- Relation -->
        <!-- /Relation -->
        <!-- Parameters -->
        <div class="row machineColumnParameters">
            <div class="parameters lightTheme">
                <!-- Title -->
                <h3 class="row parametersTitle">Parameters</h3>
                <!-- /Title -->
                <!-- List -->
                <ul class="parametersList">
                    @foreach($details as $key => $detail_param)
                    <li class="parameter required">
                        <div class="parameterRow">
                            <div class="parameterColumn parameterKeyColumn">
                                <div class="parameterKey">
                                    {{$detail_param->parama_name}}@if($detail_param->type_param == "required")<span class="text-danger"> *</span>@endif
                                </div>
                            </div>
                            <div class="parameterColumn parameterRequirementColumn">
                                <div class="parameterRequirement">
                                    @if($detail_param->type_param == "required")
                                    <span class="parameterIcon"></span>
                                    <span class="tooltip">Required</span>
                                    @endif
                                </div>
                            </div>
                            <div class="parameterColumn parameterDescriptionColumn">
                                <div class="parameterDescription markdown lightTheme">
                                    {!!$detail_param->description_detail!!}
                                </div>
                            </div>
                            <div class="parameterColumn parameterTypeColumn">
                                <div class="parameterType">
                                    {{$detail_param->api_data_type}}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <!-- /List -->
            </div>
        </div>
        <!-- /Parameters -->
        <!-- Attributes -->
        <div class="row machineColumnAttributes hidden">
            <div class="row attributesTitle">
                <h3 class="row attributesTitleText">Attributes</h3>
            </div>
            <div class="row attributes"></div>
            <div class="row attributesKit hidden"></div>
        </div>
        <!-- /Attributes -->
        <div class="machineColumnRequest">
            <!-- Title -->
            <div class="row machineColumnTitle">
                <h3 class="row machineColumnTitleText">Request</h3>
            </div>
            <!-- /Title -->
            <!-- Content -->
            <div class="machineColumnRequestContent">
                <!-- Attributes -->
                <div class="row machineColumnRequestAttributes hidden">
                    <div class="row attributesTitle">
                        <h3 class="row attributesTitleText">Attributes</h3>
                    </div>
                    <div class="row attributes"></div>
                    <div class="row attributesKit hidden"></div>
                </div>
                <!-- /Attributes -->
                <!-- Description -->
                <!-- /Description -->
                <!-- Schema -->
                <div class="row machineColumnRequestSchema"></div>
                <!-- /Controls -->
                <div class="request">
                    <div class="languageExample">
                        <div class="rawExampleContainer">
                            <div data-reactroot="" class="rawExample darkTheme">
                                <ul class="rawExampleSection rawExampleHeaders ps-container ps-theme-default" data-ps-id="48a312fe-225e-7d03-0ba9-230d16dc0651">
                                    <div class="rawExampleHeaderLabel"><span>Headers</span></div>
                                    <li class="rawExampleHeader"><span class="rawExampleHeaderKey">Content-Type</span><span class="rawExampleHeaderSeparator">:</span><span class="rawExampleHeaderValue">application/json</span></li>
                                    <li class="rawExampleHeader"><span class="rawExampleHeaderKey">Authorization</span><span class="rawExampleHeaderSeparator">:</span><span class="rawExampleHeaderValue">Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vYXBpZGV2</span></li>
                                    <li class="rawExampleHeader"><span class="rawExampleHeaderKey">Accept</span><span class="rawExampleHeaderSeparator">:</span><span class="rawExampleHeaderValue">application/json</span></li>
                                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </ul>
                                <div>
                                    <div class="rawExampleHeaderLabel"><span>Body</span></div>
                                    <div class="rawExampleJsonSchemaContainer"></div>
                                    <pre class="rawExampleSection rawExampleBody code darkTheme ps-container ps-theme-default" data-ps-id="b6a81bdf-c64f-f361-d4cf-bc79f1446fb0">
                                        <span class="line">{{$detail->body_param ?? ""}}</span>
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Content -->
        </div>
        <div class="machineColumnResponse">
            <!-- Title -->
            <div class="row machineColumnTitle">
                <h3 class="row machineColumnTitleText">Response</h3>
            </div>
            <!-- /Title -->
            <!-- Content -->
            <div class="machineColumnResponseContent">
                <!-- Attributes -->
                <div class="row machineColumnResponseAttributes hidden">
                    <div class="row attributesTitle">
                        <h3 class="row attributesTitleText">Attributes</h3>
                    </div>
                    <div class="row attributes"></div>
                    <div class="row attributesKit hidden"></div>
                </div>
                <!-- /Attributes -->
                <!-- Description -->
                <!-- /Description -->
                <!-- Schema -->
                <div class="row machineColumnResponseSchema"></div>
                <!-- /Schema -->
                <div class="response">
                    <!-- StatusCode -->
                    <div class="responseStatusCode">
                        200
                    </div>
                    <!-- /StatusCode -->
                    <div class="languageExample">
                        <div class="rawExampleContainer">
                            <div data-reactroot="" class="rawExample darkTheme">
                                <div>
                                    <div class="rawExampleHeaderLabel"><span>Body</span></div>
                                    <div class="rawExampleJsonSchemaContainer"></div>
                                    <pre class="rawExampleSection rawExampleBody code darkTheme ps-container ps-theme-default" data-ps-id="90319ab6-775c-3304-a759-e55aef06da2b">
                                        <span class="line">{{$detail->response ?? ""}}</span>
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
        </div>

        
        <div class="machineColumnResponse">
            <!-- Title -->
            <div class="row machineColumnTitle">
                <h3 class="row machineColumnTitleText">Description</h3>
            </div>
            <!-- /Title -->
            <!-- Content -->
            <div class="machineColumnResponseContent">
                
                <div class="response description_api">
                  
                    <div class="languageExample">
                        <div class="rawExampleContainer">
                            <div data-reactroot="" class="rawExample darkTheme">
                                <div>
                                    <pre class="rawExampleSection rawExampleBody code darkTheme ps-container ps-theme-default" data-ps-id="90319ab6-775c-3304-a759-e55aef06da2b">
                                        <span class="line">{!! $detail->description ?? "" !!}</span>
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
        </div>
    </div>
</div>

 

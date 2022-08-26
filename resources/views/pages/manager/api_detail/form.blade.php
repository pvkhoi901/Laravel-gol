<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="name">Category Id <span class="text-danger">*</span></label>
                    {{ Form::select('category_id', $categories, $model->category_id, ['class' => 'form-control select2', 'id' => 'category_id', 'placeholder' => 'Please select' ]) }}
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror

                </div>

                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name' , "required" => "required"]) }}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="api_url">Api URL <span class="text-danger">*</span></label>
                    {{ Form::text('api_url', $model->api_url ?? "https://apidev.canvasee.com/", ['class' => 'form-control', 'id' => 'api_url', 'placeholder' => 'api_url' , "required" => "required"]) }}
                    @error('api_url')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="api_type">Api Type( POST/GET/PUT/DELETE) <span class="text-danger">*</span></label>
                    {{ Form::select('api_type', $api_types,  $model->api_type ?? "post", ['class' => 'form-control select2', 'id' => 'api_type'  , 'placeholder' => 'Please select' , "required" => "required"]) }}
                    @error('api_type')<span class="text-danger">{{ $message }}</span>@enderror
                </div>


                <div class="form-group">
                    <label for="api_type">Parameters</label>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="table_sample_f008">
                                <thead>
                                    <tr>
                                        <th>
                                            <a class="btn btn-primary add_row" href="javascript:;" role="button">
                                                <i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Data Type
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Order
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($details))
                                    @foreach($details as $key => $detail)
                                    <tr class="">
                                        <td>
                                            <span>{{$key + 1}}</span>
                                        </td>
                                        <td>
                                            <input name="parama_name[]" type="" value="{{$detail->parama_name}}" class="form-control parama_name">
                                        </td>
                                        <td>
                                            <select name="api_data_type[]" id="" class="api_data_type select2">
                                                @foreach($api_data_types as $key => $api_data_type)
                                                <option value="{{$key}}" {{$detail->api_data_type == $key ? "selected" : ""}}>{{$api_data_type}}</option>
                                                @endforeach

                                            </select>
                                        </td>
                                        <td>
                                            <select name="type_param[]" id="" class="type_param select2">
                                                @foreach($api_type_params as $key => $type_param)
                                                <option value="{{$key}}" {{$detail->type_param == $key ? "selected" : ""}}>{{$type_param}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="description_detail[]" id="" cols="30" rows="10" class="form-control description_detail">{{$detail->description_detail}}</textarea>
                                        </td>
                                        <td>
                                            <input name="order_by_detail[]" type="number " value="{{$detail->order_by_detail}}" class="form-control order_by_detail">
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn_delete_row  text-danger mr-2">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="">
                                        <td>
                                            <span>1</span>
                                        </td>
                                        <td>
                                            <input name="parama_name[]" type="" value="" class="form-control parama_name">
                                        </td>
                                        <td>
                                            <select name="api_data_type[]" id="" class="api_data_type">
                                                @foreach($api_data_types as $key => $api_data_type)
                                                <option value="{{$key}}">{{$api_data_type}}</option>
                                                @endforeach

                                            </select>
                                        </td>
                                        <td>
                                            <select name="type_param[]" id="" class="type_param">
                                                @foreach($api_type_params as $key => $type_param)
                                                <option value="{{$key}}">{{$type_param}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="description_detail[]" id="" cols="30" rows="10" class="form-control description_detail"></textarea>
                                        </td>
                                        <td>
                                            <input name="order_by_detail[]" type="number" value="" class="form-control order_by_detail">
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn_delete_row  text-danger mr-2">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label for="body_param">Body Param Data Example</label>
                    {{ Form::textarea('body_param', null, ['class' => 'form-control', 'id' => 'body_param', 'placeholder' => 'Body Param Data']) }}
                </div>

                <div class="form-group">
                    <label for="response">Response Data</label>
                    {{ Form::textarea('response', null, ['class' => 'form-control', 'id' => 'response', 'placeholder' => 'Response Data']) }}
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control required" cols="100" rows="100" id="description">{{$model->description ?? ""}}</textarea>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('status', true, $model->status ?? 1, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                        <label class="custom-control-label pt-1" for="status">Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('categoryapi.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>



<div class="d-none">
    <table class="table" id="table_copy_f008">
        <tbody>
            <tr class="copy_row">
                <td>
                    <span class="numer_row"></span>
                </td>
                <td>
                    <input name="" type="" value="" class="form-control parama_name">
                </td>
                <td>
                    <select name="" id="" class="api_data_type">
                        @foreach($api_data_types as $key => $api_data_type)
                        <option value="{{$key}}">{{$api_data_type}}</option>
                        @endforeach

                    </select>
                </td>
                <td>
                    <select name="" id="" class="type_param">
                        @foreach($api_type_params as $key => $type_param)
                        <option value="{{$key}}">{{$type_param}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="10" class="form-control description_detail"></textarea>
                </td>

                <td>
                    <input name="" type="number" value="" class="form-control order_by_detail">
                </td>
                <td>
                    <a href="javascript:;" class="btn_delete_row  text-danger mr-2">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
        </tbody>
    </table>
</div>

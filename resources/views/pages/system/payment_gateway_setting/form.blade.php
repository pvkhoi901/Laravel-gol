@csrf
<div class="row">
   <div class="col-md-8">
      <div class="card">
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name <span class="text-danger">*</span></label>
               {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'id' => 'name', 'placeholder' => 'name' ,"readonly" =>"readonly"]) }}
               @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
         </div>
      </div>
      @foreach($config_groups as $group=> $configs)
      <div class="card">
         <div class="card-body">
            <h5 class="card-title">{{$groups_list[$group]}}</h5>
            <div class="row">
               @foreach($configs as $config)
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="{{$config->key}}">{{str_replace('_',' ',ucfirst(strtolower($config->key)))}}
                        @if($config->is_required) <span class="text-danger">*</span> @endif
                     </label>
                     {{-- @if(in_array($config->type , ["text" , "password" , "email" ])) --}}
                     @if($config->type == "text" )
                     {{ Form::text($config->key, $config->value, ["name" =>  "configs[$config->key]" , 'class' => 'form-control form-control-lg', 'id' => $config->key,   'required' => $config->is_required , "maxlength" =>255 , "type" =>  $config->type])}}
                     @elseif($config->type=='password')
                     <input value="{{$config->value}}" class="form-control" id="{{$config->key}}"
                        name="{{$config->key}}" type="password">
                     @elseif($config->type=='email')
                     <input value="{{$config->value}}" class="form-control" id="{{$config->key}}"
                        name="{{$config->key}}" type="email">
                     @elseif($config->type=='number')
                     <input value="{{$config->value}}" class="form-control" id="{{$config->key}}"
                        name="{{$config->key}}" type="number" step="0.1">
                     @elseif($config->type=='select_multi')
                     @php
                     $options = $config->options? json_decode($config->options , true) :[];
                     $values =$config->value? json_decode($config->value , true) :[];
                     @endphp
                     <select class="form-control select2" multiple="multiple" name="configs[{{$config->key}}][]"
                        {{$config->is_required?'required':''}}>
                        <option>Select</option>
                        @foreach($options as $key=> $option)
                        <option value="{{$key}}" {{ in_array($key ,$values)  ?'selected=selected':''}}>{{$option}}
                        </option>
                        @endforeach
                     </select>
                     @elseif($config->type=='radio')
                     @php
                     $options = $config->options? json_decode($config->options , true) :[];
                     @endphp
                     <div class="form-group">
                        @foreach ( $options as $key => $option)
                        <div class="form-check form-check-inline">
                           <label class="form-check-label">
                              {{ Form::radio("configs[$config->key]",$key , $key ==$config->value ? "checked" : ""  , ['class' => 'form-check-input']) }}
                              {{$option}}
                              <i class="input-frame"></i></label>
                        </div>
                        @endforeach
                     </div>
                     @else
                     @php
                     $options = $config->options?explode('|',$config->options):[];
                     @endphp
                     {{ Form::select($config->key, $options, $config->value, ['class' => 'form-control form-control-lg select2', 'id' => $config->key, 'required' => $config->is_required]) }}
                     @endif
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      @endforeach
   </div>
   <div class="col-md-4">
      <div class="card">
         <div class="card-body">
            <div class="form-group">
               <label for="name">Status</label>
               <div class="custom-control custom-switch">
                  {{ Form::checkbox('status', true, null, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                  <label class="custom-control-label pt-1" for="status">Active</label>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="form-group text-right mt-5">
   <a class="btn btn-secondary" href="{{ route('payment_gateway_setting.index') }}">Cancel</a>
   <button class="btn btn-primary">{{ $button }}</button>
</div>
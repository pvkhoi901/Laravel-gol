@extends('layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Languages</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('languages.create') }}">
                    Add New
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">

            {!! Form::open(['route' => 'settings.store']) !!}
            <div class="card">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-tab1-tab" data-toggle="pill" href="#tab-1" role="tab" aria-controls="pills-tab1" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-tab2-tab" data-toggle="pill" href="#tab-2" role="tab" aria-controls="pills-tab2" aria-selected="false">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-tab3-tab" data-toggle="pill" href="#tab-3" role="tab" aria-controls="pills-tab3" aria-selected="false">Option</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-tab4-tab" data-toggle="pill" href="#tab-4" role="tab" aria-controls="pills-tab4" aria-selected="false">Social Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-tab7-tab" data-toggle="pill" href="#tab-7" role="tab" aria-controls="pills-tab7" aria-selected="false">Custom CSS/JS</a>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="pills-tab1-tab">
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Website name</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="website_name" value="{{isset($configs['config']['website_name']) ? $configs['config']['website_name'] : ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Meta title</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="meta_title" value="{{isset($configs['config']['meta_title']) ? $configs['config']['meta_title'] : ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="meta_description">Meta
                                    description</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <textarea class="form-control" name="meta_description">{{isset($configs['config']['meta_description']) ? $configs['config']['meta_description'] : ''}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Logo</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm_image_logo" data-input="image_logo" data-preview="holder_image_logo" class="btn btn-primary lfm">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image_logo" name="image_logo" class="form-control" type="text" name="filepath" value="{{$configs['config']['image_logo'] ?? ""}}">
                                            <div class="holder_image_logo" id="holder_image_logo">
                                                <img src="{{$configs['config']["image_logo"] ?? ""}}" style="height: 5rem;">
                                            </div>
                                        </div>


                                        @if($errors->has('image_logo'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('image_logo') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Favicon</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="image_favicon" data-preview="holder_image_favicon" class="btn btn-primary lfm">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image_favicon" name="image_favicon" class="form-control" type="text" name="filepath" value="{{$configs['config']['image_favicon'] ?? ""}}">
                                            <div class="holder_image_favicon" id="holder_image_favicon">
                                                <img src="{{$configs['config']["image_favicon"] ?? ""}}" style="height: 5rem;">
                                            </div>
                                        </div>

                                        @if($errors->has('image_favicon'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('image_favicon') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="is_change_language">Display Change language</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="form-group">

                                        <div><input type="checkbox" name="is_change_language" id="is_change_language" class="js-small-facebook" @if(isset($configs['config']['is_change_language']) && $configs['config']['is_change_language']==1) checked="" @endif value="1" />
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @foreach(COUNTRY as $key => $value)
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">{{$value}} flag</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="image_flag_{{$key}}" data-preview="holder_image_flag_{{$key}}" class="btn btn-primary lfm">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image_flag_{{$key}}" name="image_flag_{{$key}}" class="form-control" type="text" name="filepath" value="{{$configs['config']["image_flag_$key"] ?? ""}}">
                                            <div class="holder_image_flag_{{$key}}" id="holder_image_flag_{{$key}}">
                                                <img src="{{$configs['config']["image_flag_$key"] ?? ""}}" style="height: 5rem;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="gmap_api_key">Google Map API</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="gmap_api_key" id="gmap_api_key" value="{{isset($configs['config']['gmap_api_key']) ? $configs['config']['gmap_api_key'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="google_analytics">Google
                                    Analytics</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <textarea class="form-control" name="google_analytics" id="google_analytics">{{isset($configs['config']['google_analytics']) ? $configs['config']['google_analytics'] : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="facebook_pixel_id">Facebook
                                    Pixel ID</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="facebook_pixel_id" id="facebook_pixel_id" value="{{isset($configs['config']['facebook_pixel_id']) ? $configs['config']['facebook_pixel_id'] : ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="facebook_app_id">Facebook
                                    App ID</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="facebook_app_id" id="facebook_app_id" value="{{isset($configs['config']['facebook_app_id']) ? $configs['config']['facebook_app_id'] : ''}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="contact_us_description">Contact Us Description</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <textarea class="form-control" name="contact_us_description" id="contact_us_description">{{isset($configs['config']['contact_us_description']) ? $configs['config']['contact_us_description'] : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Facebook Url</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="facebook_url" value="{{isset($configs['config']['facebook_url']) ? $configs['config']['facebook_url'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Youtube Url</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="youtube_url" value="{{isset($configs['config']['youtube_url']) ? $configs['config']['youtube_url'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Instagram Url</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="instagram_url" value="{{isset($configs['config']['instagram_url']) ? $configs['config']['instagram_url'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">LinkedIn Url</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="linkedin_url" value="{{isset($configs['config']['linkedin_url']) ? $configs['config']['linkedin_url'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Twitter Url</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="twitter_url" value="{{isset($configs['config']['twitter_url']) ? $configs['config']['twitter_url'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">TikTok Url</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="tiktok_url" value="{{isset($configs['config']['tiktok_url']) ? $configs['config']['tiktok_url'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="tiktok_pixel_id">TikTok
                                    Pixel ID</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="tiktok_pixel_id" id="tiktok_pixel_id" value="{{isset($configs['config']['tiktok_pixel_id']) ? $configs['config']['tiktok_pixel_id'] : ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="facebook_chat">Facebook
                                    Chat</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">
                                        <textarea id="facebook_chat" name="facebook_chat" id="" cols="200" rows="20" {{isset($configs['config']['facebook_type']) ? (
                                    $configs['config']['facebook_type']=="chat" ? "" : "hidden" ) : ""
                                    }}>{{isset($configs['config']['facebook_chat']) ? $configs['config']['facebook_chat'] : ''}}</textarea>

                                        <input type="text" class="form-control" name="facebook_link" id="facebook_link" {{isset($configs['config']['facebook_type']) ? (
                                    $configs['config']['facebook_type']=="link" ? "" : "hidden" ) : "" }} value="{{isset($configs['config']['facebook_link']) ? $configs['config']['facebook_link'] : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="pills-tab2-tab">
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="store_name">Store
                                    Name</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_name" value="{{isset($configs['config']['store_name']) ? $configs['config']['store_name'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="store_address">Street</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_address" id="store_address" value="{{isset($configs['config']['store_address']) ? $configs['config']['store_address'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="store_telephone">Telephone</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_telephone" id="store_telephone" value="{{isset($configs['config']['store_telephone']) ? $configs['config']['store_telephone'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="store_email">Email</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_email" id="store_email" value="{{isset($configs['config']['store_email']) ? $configs['config']['store_email'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="store_fax">Fax</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_fax" id="store_fax" value="{{isset($configs['config']['store_fax']) ? $configs['config']['store_fax'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Postal / ZIP code</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_zip" value="{{isset($configs['config']['store_zip']) ? $configs['config']['store_zip'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">City</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_city" value="{{isset($configs['config']['store_city']) ? $configs['config']['store_city'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Country/Region</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <select class="form-control" name="store_country">



                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Latitude</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_latitude" value="{{isset($configs['config']['store_latitude']) ? $configs['config']['store_latitude'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Longitude</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="store_longitude" value="{{isset($configs['config']['store_longitude']) ? $configs['config']['store_longitude'] : ''}}">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="pills-tab3-tab">
                        <div class="card-body">
                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="timezone">Time Zone</label>
                                <div class="col-sm-8 col-lg-8">
                                    <select class="form-control" name="timezone">



                                    </select>

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 form-control-label text-right" for="first_name">Date format
                                </label>
                                <div class="col-sm-8 col-lg-8">
                                    <select class="form-control" name="date_format">
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d-m-Y" ) selected="" @endif value="d-m-Y">
                                            d-m-Y ({{date('d-m-Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="m-d-Y" ) selected="" @endif value="m-d-Y">
                                            m-d-Y ({{date('m-d-Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="Y-m-d" ) selected="" @endif value="Y-m-d">
                                            Y-m-d ({{date('Y-m-d')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d.m.Y" ) selected="" @endif value="d.m.Y">
                                            d.m.Y ({{date('d.m.Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="m.d.Y" ) selected="" @endif value="m.d.Y">
                                            m.d.Y ({{date('m.d.Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="Y.m.d" ) selected="" @endif value="Y.m.d">
                                            Y.m.d ({{date('Y.m.d')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d/m/Y" ) selected="" @endif value="d/m/Y">
                                            d/m/Y ({{date('d/m/Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="m/d/Y" ) selected="" @endif value="m/d/Y">
                                            m/d/Y ({{date('m/d/Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="Y/m/d" ) selected="" @endif value="Y/m/d">
                                            Y/m/d ({{date('Y/m/d')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d-M-Y" ) selected="" @endif value="d-M-Y">
                                            d-M-Y ({{date('d-M-Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d/M/Y" ) selected="" @endif value="d/M/Y">
                                            d/M/Y ({{date('d/M/Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d.M.Y" ) selected="" @endif value="d.M.Y">
                                            d.M.Y ({{date('d.M.Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d-M-Y" ) selected="" @endif value="d-M-Y">
                                            d-M-Y ({{date('d-M-Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d M Y" ) selected="" @endif value="d M Y">d
                                            M Y ({{date('d M Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d F, Y" ) selected="" @endif value="d F, Y">
                                            d F, Y ({{date('d F, Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="D/M/Y" ) selected="" @endif value="D/M/Y">
                                            D/M/Y ({{date('D/M/Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="D.M.Y" ) selected="" @endif value="D.M.Y">
                                            D.M.Y ({{date('D.M.Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="D-M-Y" ) selected="" @endif value="D-M-Y">
                                            D-M-Y ({{date('D-M-Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="D M Y" ) selected="" @endif value="D M Y">D
                                            M Y ({{date('D M Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="d D M Y" ) selected="" @endif value="d D M Y">d D M Y ({{date('d D M Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="D d M Y" ) selected="" @endif value="D d M Y">D d M Y ({{date('D d M Y')}})</option>
                                        <option @if(isset($configs['config']['date_format']) && $configs['config']['date_format']=="dS M Y" ) selected="" @endif value="dS M Y">
                                            dS M Y ({{date('dS M Y')}})</option>
                                    </select>

                                </div>
                            </div>





                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 form-control-label text-right" for="time_format">Time format
                                </label>
                                <div class="col-sm-8 col-lg-8">
                                    <select class="form-control" name="time_format">
                                        <option @if(isset($configs['config']['time_format']) && $configs['config']['time_format']=="h:i A" ) selected="" @endif value="h:i A">12
                                            Hour (6:30 PM) </option>
                                        <option @if(isset($configs['config']['time_format']) && $configs['config']['time_format']=="h:i a" ) selected="" @endif value="h:i a">12
                                            Hour (6:30 pm)</option>
                                        <option @if(isset($configs['config']['time_format']) && $configs['config']['time_format']=="H:i" ) selected="" @endif value="H:i">24
                                            Hour (18:30) </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="config_theme">Themes</label>
                                <div class="col-sm-8 col-lg-8">
                                    <select class="form-control" name="config_theme" id="config_theme">
                                        <option value="default">Default</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="language">Language</label>
                                <div class="col-sm-8 col-lg-8">
                                    <select class="form-control" name="language" id="language">
                                        <option value="en">English</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="store_currency">Store
                                    currency</label>
                                <div class="col-sm-8 col-lg-8">
                                    <select class="form-control" name="store_currency" id="store_currency">

                                    </select>

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="watermark_enlable">Watermark
                                    Enable</label>
                                <div class="col-sm-8 col-lg-8">

                                    <div class="form-group">

                                        <div><input type="checkbox" name="watermark_enlable" id="watermark_enlable" class="js-small-watermark" @if(isset($configs['config']['watermark_enlable']) && $configs['config']['watermark_enlable']==1) checked="" @endif value="1" />
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Watermark Image</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <input type="file" name="watermark_image" class="form-control dropify" @if(isset($configs['config']['watermark_image'])) data-default-file="{{asset("
                                    storage/".$configs['config']['watermark_image'])}}" @endif data-min-height="16">
                                        @if($errors->has('watermark_image'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('watermark_image') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="pills-tab4-tab">
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="facebook_login">Facebook
                                    Login</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="form-group">

                                        <div><input type="checkbox" name="facebook_login" id="facebook_login" class="js-small-facebook" @if(isset($configs['config']['facebook_login']) && $configs['config']['facebook_login']==1) checked="" @endif value="1" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="fb_login_setting">
                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label text-right" for="fb_app_id">App
                                        ID</label>
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">

                                            <div><input type="text" name="fb_app_id" id="fb_app_id" class="form-control" value="{{isset($configs['config']['fb_app_id']) ? $configs['config']['fb_app_id'] : ''}}" />
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label text-right" for="fb_app_secret">App
                                        Secret</label>
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">

                                            <div><input type="text" name="fb_app_secret" id="fb_app_secret" class="form-control" value="{{isset($configs['config']['fb_app_secret']) ? $configs['config']['fb_app_secret'] : ''}}" />
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="google_login">Google
                                    Login</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="form-group">

                                        <div><input type="checkbox" name="google_login" id="google_login" class="js-small-google" @if(isset($configs['config']['google_login']) && $configs['config']['google_login']==1) checked="" @endif value="1" /></div>

                                    </div>
                                </div>
                            </div>
                            <div id="gg_login_setting">
                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label text-right" for="gg_app_id">App
                                        ID</label>
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">

                                            <div><input type="text" name="gg_app_id" id="gg_app_id" class="form-control" value="{{isset($configs['config']['gg_app_id']) ? $configs['config']['gg_app_id'] : ''}}" />
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label text-right" for="gg_app_secret">App
                                        Secret</label>
                                    <div class="col-sm-8 col-lg-8">
                                        <div class="form-group">

                                            <div><input type="text" name="gg_app_secret" id="gg_app_secret" class="form-control" value="{{isset($configs['config']['gg_app_secret']) ? $configs['config']['gg_app_secret'] : ''}}" />
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="pills-tab5-tab">
                        <div class="card-body">


                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="pills-tab6-tab">
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right" for="maintenance_mode">Enable
                                    Maintenance mode:</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="form-group">

                                        <div><input type="checkbox" name="maintenance_mode" id="maintenance_mode" class="js-small" @if(isset($configs['config']['maintenance_mode']) && $configs['config']['maintenance_mode']==1) checked="" @endif value="1" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Allowed IP's:</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">


                                        <input class="form-control" name="allowed_ips" data-role="tagsinput" value="{{isset($configs['config']['allowed_ips']) ? $configs['config']['allowed_ips'] : ''}}">



                                    </div>
                                    <p>My IP Address Is: {{Request::ip()}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-lg-2 col-form-label text-right">Maintenance mode message:</label>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">

                                        <textarea class="form-control" id="maintenance_message" name="maintenance_message">{{isset($configs['config']['maintenance_message']) ? $configs['config']['maintenance_message'] : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="pills-tab7-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-sm-4 col-lg-2 col-form-label text-right">CSS</label>
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="input-group">
                                                <textarea class="form-control" name="custom_header" rows="80">{{isset($configs['config']['custom_header']) ? $configs['config']['custom_header'] : ''}}</textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-4 col-lg-2 col-form-label text-right">JS</label>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="input-group">

                                            <textarea class="form-control" name="custom_footer" rows="80">{{isset($configs['config']['custom_footer']) ? $configs['config']['custom_footer'] : ''}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection



@push('plugin-styles')
<style>
    .card-body label {
        margin-bottom: 10px;
    }

</style>
@endpush



@push('plugin-scripts')
<script src="/vendor/ckeditor/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    $(document).ready(function() {


        $('.lfm').filemanager('ladding_image');
    });

</script>
@endpush

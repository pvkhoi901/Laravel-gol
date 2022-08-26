@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">Influencer Report Detail From {{date('d-m-Y', strtotime($influencer->created_at))}} </h4>
                    <div class="my-3 text-right">
                         
                    </div>
                    <div class="card">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="country_id">Country</label>
                                                {{ Form::select('country_id', \App\Models\YoutubeCategory::COUNTRY, null, ['class' => 'form-control select2 change_country', 'id' => 'country_id']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 div_result_change_country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date_search">Date From To</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control search_condition date_search" value="{{date("Y-m-d")}}" id="date_search">
                                                        <span class="input-group-addon">
                                                            <i class="glyphicon glyphicon-th"></i>
                                                        </span>
                                                  </div>
                                            </div> 
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 table_seach">
                                    
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
@endpush

@push('plugin-scripts')
<script src="{{ mix('js/pages/influencer.js') }}"></script>
@endpush
 
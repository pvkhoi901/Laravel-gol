<div class="row justify-content-md-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf

                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            {{Form::label('name_of_facility', 'Name of the facility:', ['class' => ''])}}
                            {{Form::text('name_of_facility', null, ['class' => 'form-control', 'id' => 'name_of_facility', 'placeholder' => '', 'required' => false])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('number_of_bed', 'Number of beds:', ['class' => ''])}}
                            {{Form::text('number_of_bed', null, ['class' => 'form-control', 'id' => 'number_of_bed', 'placeholder' => '', 'required' => false])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('type_of_housing', 'Type of housing:', ['class' => ''])}}
                            {{Form::select('type_of_housing', \App\Models\ShelterAddress::TYPE_OF_HOUSING, null, ['class' => 'form-control ', 'id' => 'type_of_housing', 'required' => false])}}
                        </div>

                        <div>
                            <label for="puk_2" class="col-form-label m-0">Dwelling houses</label>
                            <div>
                                @foreach(\App\Models\ShelterAddress::DWELLLING_HOUSES as $key => $value)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {{Form::radio('dwelling_houses', $key, ['class' => 'form-check-input'])}}
                                            {{$value}}
                                            <i class="input-frame"></i></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('contact_number', 'Contact number:', ['class' => ''])}}
                            {{Form::text('contact_number', null, ['class' => 'form-control', 'id' => 'contact_number', 'placeholder' => ''])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('service_address', 'Service Address:', ['class' => ''])}}
                            {{Form::text('service_address', null, ['class' => 'form-control', 'id' => 'service_address', 'placeholder' => ''])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('zip_code', 'Zip code:', ['class' => ''])}}
                            {{Form::text('zip_code', null, ['class' => 'form-control', 'id' => 'zip_code', 'placeholder' => ''])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('city', 'City:', ['class' => ''])}}
                            {{Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'Please enter Zip Code first', 'readonly' => true])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('state', 'State:', ['class' => ''])}}
                            {{Form::select('state', STATE, null, ['class' => 'form-control ', 'id' => 'state', 'placeholder' => 'Please enter Zip Code first', 'readonly' => true])}}
                        </div>


                    </div>

                    <div class="col-6">
                        <div class="form-check form-check-inline" style="margin-bottom: 20px;margin-top: 39px;">
                            <label class="form-check-label" for="copy_to_melissa">Copy Above to Melissa Address
                                {{Form::checkbox('copy_to_melissa', true, null, ['class' => 'form-control', 'id' => 'copy_to_melissa', 'required' => false, 'disabled' => true])}}
                            </label>
                        </div>

                        <div class="form-group">
                            {{Form::label('melissa_address', 'Melissa Address1	:', ['class' => ''])}}
                            {{Form::text('melissa_address', null, ['class' => 'form-control', 'id' => 'melissa_address'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('melissa_zip_code', 'Melissa Zip Code:', ['class' => ''])}}
                            {{Form::text('melissa_zip_code', null, ['class' => 'form-control', 'id' => 'melissa_zip_code', 'placeholder' => ''])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('melissa_city', 'Melissa City:', ['class' => ''])}}
                            {{Form::text('melissa_city', null, ['class' => 'form-control', 'id' => 'melissa_city', 'placeholder' => 'Please enter Melissa Zip Code first', 'readonly' => true])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('melissa_state', 'Melissa State:', ['class' => ''])}}
                            {{Form::select('melissa_state', STATE, null, ['class' => 'form-control ', 'id' => 'melissa_state', 'placeholder' => 'Please enter Melissa Zip Code first', 'readonly' => true])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('status', 'Status:', ['class' => ''])}}
                            {{Form::select('status', [\App\Models\ShelterAddress::STATUS], null, ['class' => 'form-control ', 'id' => 'status', 'required' => false])}}
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <div class="form-group text-right mt-5">
                    <a class="btn btn-secondary" href="{{route('shelter-address.index')}}">Cancel</a>
                    <button class="btn btn-primary">{{$button}}</button>
                </div>
            </div>

        </div>
    </div>
</div>

@push('plugin-scripts')
    <script>
        (function ($) {
            "use strict";
            const zip_code_input = $('#zip_code')

            if (zip_code_input.val())
                $('#copy_to_melissa').prop('disabled', false)

            zip_code_input.change(function (event) {
                const city_input = $('#city')
                const state_input = $('#state')
                const copy_to_melissa_checkbox = $('#copy_to_melissa')
                const zip_code = $(this).val()

                console.log('zip_code: ', zip_code)

                if (zip_code) {
                    copy_to_melissa_checkbox.prop('disabled', false)
                    try {
                        $.ajax({
                            type: "GET",
                            url: `https://expressentry.melissadata.net/web/ExpressAddress?postalcode=${zip_code}&id=Cx4iDYbRuXHpZX7aXlYjs1**&maxrecords=1&format=json`,
                            dataType: 'json',
                            async: true,
                            beforeSend: function () {
                            },
                            success: function (response) {
                                if (response['Results'].length) {
                                    const data = response['Results'][0]['Address']
                                    console.log('data: ', data)

                                    city_input.val(data.City)
                                    state_input.val(data.State)
                                } else {
                                    alert('Invalid zip code. Please re-enter!')
                                }
                            },
                            error: function (jqXHR) {
                                const response = $.parseJSON(jqXHR.responseText)
                                if (response.message) {
                                    alert(response.message)
                                    return response.message
                                }
                            }
                        });
                    } catch (e) {
                        console.log('error: ', e)
                    }
                } else {
                    copy_to_melissa_checkbox.prop('disabled', true)
                }

            })

            $('#copy_to_melissa').change(function (event) {
                const copy_to_melissa_checkbox = $(this)
                const zip_code = $('#zip_code')
                const city_input = $('#city')
                const state_input = $('#state')
                const service_address = $('#service_address')

                const melissa_address_input = $('#melissa_address')
                const melissa_zip_code_input = $('#melissa_zip_code')
                const melissa_city_input = $('#melissa_city')
                const melissa_state_input = $('#melissa_state')

                if (copy_to_melissa_checkbox.is(':checked')) {
                    melissa_address_input.val(service_address.val())
                    melissa_zip_code_input.val(zip_code.val())
                    melissa_city_input.val(city_input.val())
                    melissa_state_input.val(state_input.val())
                } else {
                    melissa_address_input.val('')
                    melissa_zip_code_input.val('')
                    melissa_city_input.val('')
                    melissa_state_input.val('')
                }

                console.log('copy_to_melissa_checkbox: ', copy_to_melissa_checkbox.is(':checked'))
            })


        })(jQuery);

        function getStateByZipCode(zip_code) {
            try {
                console.log('11111')
                var jqXHR =
                    console.log('22222', jqXHR.responseText)
                return jqXHR.responseJSON;

            } catch (e) {
                console.log('error: ', e)
            }
        }

    </script>
@endpush
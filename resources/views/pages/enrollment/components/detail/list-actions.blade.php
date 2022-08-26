<div class="card mb-5">
    <div class="card-body">
        <h3 class="card-title">REVIEW</h3>
        <form>

            <div class="mb-3">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input review_input" value="approve">
                    <label class="custom-control-label" for="customRadioInline1">APPROVE</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input review_input" value="deny">
                    <label class="custom-control-label" for="customRadioInline2">DENY</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input review_input" value="slr">
                    <label class="custom-control-label" for="customRadioInline3">SECOND LEVEL REVIEW (SLR)</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input review_input" value="follow_up">
                    <label class="custom-control-label" for="customRadioInline4">FOLLOW UP REQUIRED </label>
                </div>
            </div>

            <div id="denial_box" style="display: none">
                <div class="card mb-3">
                    <div class="card-header">Denial reason:*</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($rejection_reasons as $reason_category)
                                @if(count($reason_category->reasons))
                                    <div class="col-3">
                                        <h5>{{$reason_category->name}}</h5>
                                        <ul class="list-group list-group-flush">
                                            @foreach($reason_category->reasons as $reason)
                                                <li class="list-group-item">
                                                    <input type="checkbox" value="">
                                                    {{$reason->name}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Denial Comment*:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="remark_box" style="display: none">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Remark*:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" id="btn_review_submit" type="submit" style="display: none">Submit</button>
        </form>
    </div>
</div>

@push('plugin-scripts')
    <script>
        $('.review_input').on('change', function () {
            let review_selected = $('input[name=customRadioInline1]:checked').val()
            console.log('review_selected:', review_selected)

            $('#btn_review_submit').show()


            if (review_selected === 'deny') {
                $('#denial_box').show()
                $('#remark_box').hide()
            } else if (review_selected === 'slr' || review_selected === 'follow_up') {
                $('#denial_box').hide()
                $('#remark_box').show()
            } else {
                $('#denial_box').hide()
                $('#remark_box').hide()
            }

        });
    </script>


    <script>
        window.onload = function (e) {
            $('#approve_div').click(function () {
                $('#div_approve').show();
                $('#div_denial').hide();
                $('.div_change_status').hide();
                $('#request_image_box').hide();
                $('.approve_deny:first .radio:first').css('color', 'green');
                $('#denyBar .radio:first').css('color', '#333');
            });

            $('#denial').click(function () {
                $('#div_approve').hide();
                $('.div_change_status').hide();
                $('#request_image_box').hide();
                $('#noduplicate').attr('checked', false);
                $('#div_denial').show();
                $('#denyBar .radio:first').css('color', 'red');

                if ($('#readytoapprove').val() == 1) {
                    $('.approve_deny:first .radio:first').css('color', '#333');
                }
            });
            $('.level_status_div').each(function () {
                this.onclick = function () {
                    $('.div_change_status').hide();
                    var ln = ".level" + $(this).attr("level-name");
                    $(ln + ' .div_change_status').show();
                    $('#div_approve').hide();
                    $('#div_denial').hide();
                    $('#request_image_box').hide();
                    $('.approve_deny:first .radio:first').css('color', '#333');
                    $('#denyBar .radio:first').css('color', '#333');
                    sessionStorage.level = ln;
                    // cancel button
                }
            })
        }

    </script>
@endpush

<style>
    .approve_deny {
        padding: 3px 20px;
        background: #efefef;
        box-shadow: 0 0 2px 1px #ccc;
        margin-top: 20px;
    }

    .approve_deny .radio {
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 20px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        line-height: 32px;
    }

    .approve_deny .radio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .approve_deny .checkround {
        position: absolute;
        top: 6px;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border-color: #f8204f;
        border-style: solid;
        border-width: 2px;
        border-radius: 50%;
    }

    .approve_deny .radio input:checked ~ .checkround {
        background-color: #fff;
    }

    .approve_deny .checkround:after {
        content: "";
        position: absolute;
        display: none;
    }

    .approve_deny .radio input:checked ~ .checkround:after {
        display: block;
    }

    .approve_deny .radio .checkround:after {
        left: 2px;
        top: 2px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #f8204f;
    }

    .approve_deny .check {
        display: block;
        position: relative;
        padding-left: 25px;
        margin-bottom: 12px;
        padding-right: 15px;
        cursor: pointer;
        font-size: 18px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .approve_deny .check input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .approve_deny .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #fff;
        border-color: #f8204f;
        border-style: solid;
        border-width: 2px;
    }

    .approve_deny .check input:checked ~ .checkmark {
        background-color: #fff;
    }

    .approve_deny .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .approve_deny .check input:checked ~ .checkmark:after {
        display: block;
    }

    .approve_deny .check .checkmark:after {
        left: 5px;
        top: 1px;
        width: 5px;
        height: 10px;
        border: solid;
        border-color: #f8204f;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .btn_WRP_hbox {
        margin: 10px 30px;
    }

    .table-fixed thead {
        position: sticky;
        position: -webkit-sticky;
        top: 0;
        z-index: 999;
        background-color: #81aeb9;
        color: #fff;
    }
</style>



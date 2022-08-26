<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            {{ Form::text('first_name', null, ['class' => 'form-control ', 'id' => 'first_name', 'placeholder' => 'First Name', "maxlength" => 255 , "autocomplete" => "off"  ]) }}
                                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="m_name">Middle name <span class="text-danger">*</span></label>
                                            {{ Form::text('m_name', null, ['class' => 'form-control ', 'id' => 'm_name', 'placeholder' => 'Middle name', "maxlength" => 255  , "autocomplete" => "off" ]) }}
                                            @error('m_name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="l_name">Last name <span class="text-danger">*</span></label>
                                            {{ Form::text('l_name', null, ['class' => 'form-control ', 'id' => 'l_name', 'placeholder' => 'Last name', "maxlength" => 255 , "autocomplete" => "off" ]) }}
                                            @error('l_name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="acco_pass">Password <span class="text-danger">*</span></label>
                            {{ Form::text('acco_pass', null, ['class' => 'form-control ', 'id' => 'acco_pass', 'placeholder' => 'acco_pass' ]) }}
                            @error('acco_pass')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="primary_phone">Alternate PN</label>
                            {{ Form::text('primary_phone', null, ['class' => 'form-control ', 'id' => 'primary_phone', 'placeholder' => 'primary_phone' ]) }}
                            @error('primary_phone')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="scrt_ques">Customer Security Question</label>
                            {{ Form::select('scrt_ques', $model::QUESTION, null, ['class' => 'form-control select2', 'id' => 'scrt_ques']) }}
                            @error('scrt_ques')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="scrt_q_ans">Answer</label>
                            {{ Form::text('scrt_q_ans', null, ['class' => 'form-control ', 'id' => 'scrt_q_ans', 'placeholder' => 'scrt_q_ans' ]) }}
                            @error('scrt_q_ans')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {{ Form::text('email', null, ['class' => 'form-control ', 'id' => 'email', 'placeholder' => 'email' ]) }}
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label style="font-size: 17px; font-weight: bold;">Authorized User1</label>
                        </div>
                        <div class="form-group">
                            <label for="authorized_user">A/U Name</label>
                            {{ Form::text('authorized_user', null, ['class' => 'form-control ', 'id' => 'authorized_user', 'placeholder' => 'authorized_user' ]) }}
                            @error('authorized_user')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="authorized_user_relationship">A/U Relationship</label>
                            {{ Form::text('authorized_user_relationship', null, ['class' => 'form-control ', 'id' => 'authorized_user_relationship', 'placeholder' => 'authorized_user_relationship' ]) }}
                            @error('authorized_user_relationship')<span
                                class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="dob_1">A/U DOB (YYYY-MM-DD)</label>
                            {{ Form::text('dob_1', null, ['class' => 'form-control datepicker', 'id' => 'dob_1', 'placeholder' => 'BirthDay', 'autocomplete' => 'off' ]) }}
                            @error('dob_1')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="authorized_user_ssn">A/U SSN (Last 4 digits)</label>
                            {{ Form::text('authorized_user_ssn', null, ['class' => 'form-control numeric', 'id' => 'authorized_user_ssn', 'placeholder' => 'authorized_user_ssn' , "maxlength" => 4 ]) }}
                            @error('authorized_user_ssn')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="authorized_password">A/U Password</label>
                            {{ Form::text('authorized_password', null, ['class' => 'form-control ', 'id' => 'authorized_password', 'placeholder' => 'authorized_password' ]) }}
                            @error('authorized_password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="authorized_sec_question">Customer Security Question</label>
                            {{ Form::select('authorized_sec_question', $model::QUESTION, null, ['class' => 'form-control select2', 'id' => 'authorized_sec_question']) }}
                            @error('authorized_sec_question')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="authorized_sec_answer">AU S/Q Answer</label>
                            {{ Form::text('authorized_sec_answer', null, ['class' => 'form-control ', 'id' => 'authorized_sec_answer', 'placeholder' => 'authorized_sec_answer' ]) }}
                            @error('authorized_sec_answer')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label style="font-size: 17px; font-weight: bold;">Authorize User2</label>
                        </div>
                        <div class="form-group">
                            <label for="authorized_user2_id">A/U Name</label>
                            {{ Form::text('authorized_user2_id', null, ['class' => 'form-control ', 'id' => 'authorized_user2_id', 'placeholder' => 'authorized_user2_id' ]) }}
                            @error('authorized_user2_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="authorized_user2_relationship">A/U Relationship</label>
                            {{ Form::text('authorized_user2_relationship', null, ['class' => 'form-control ', 'id' => 'authorized_user2_relationship', 'placeholder' => 'authorized_user2_relationship' ]) }}
                            @error('authorized_user2_relationship')<span
                                class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="dob_2">A/U DOB (YYYY-MM-DD)</label>
                            {{ Form::text('dob_2', null, ['class' => 'form-control datepicker', 'id' => 'dob_2', 'placeholder' => 'BirthDay', 'autocomplete' => 'off' ]) }}
                            @error('dob_2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="authorized_user2_ssn">A/U SSN (Last 4 digits)</label>
                            {{ Form::text('authorized_user2_ssn', null, ['class' => 'form-control numeric', 'id' => 'authorized_user2_ssn', 'placeholder' => 'authorized_user2_ssn' , "maxlength" => 4 ]) }}
                            @error('authorized_user2_ssn')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="authorized_password_user2">A/U Password</label>
                            {{ Form::text('authorized_password_user2', null, ['class' => 'form-control ', 'id' => 'authorized_password_user2', 'placeholder' => 'authorized_password_user2' ]) }}
                            @error('authorized_password_user2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="authorized_sec_question_user2">A/U S/Q</label>
                            {{ Form::select('authorized_sec_question_user2', $model::QUESTION, null, ['class' => 'form-control select2', 'id' => 'authorized_sec_question_user2']) }}
                            @error('authorized_sec_question_user2')<span
                                class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="authorized_sec_answer_user2">AU S/Q Answer</label>
                            {{ Form::text('authorized_sec_answer_user2', null, ['class' => 'form-control ', 'id' => 'authorized_sec_answer_user2', 'placeholder' => 'authorized_sec_answer_user2' ]) }}
                            @error('authorized_sec_answer_user2')<span
                                class="text-danger">{{ $message }}</span>@enderror
                        </div>


                        <div class="form-group">
                            <label for="notes">Notes </label>
                            {{ Form::textarea('notes', null, ['class' => 'form-control', 'id' => 'notes', 'placeholder' => 'Note']) }}
                            @error('notes')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>


                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('status', true,$model->status == '0' ? false : true, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                                <label class="custom-control-label pt-1" for="status">Status</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('note_type.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>
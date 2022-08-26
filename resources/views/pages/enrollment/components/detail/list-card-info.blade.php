<div class="card-group enrollment-card">
    <div class="card">
        <div class="card-body">
            <table>
                <tbody>
                <tr>
                    <td>First Name:</td>
                    <td>
                        <div class="tooltip_review current">
                            <span data-spn="spn_name" id="spn_name_val" class="copy">{{$enrollment->first_name}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>middle Name:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_mname" id="spn_mname_val"
                                  class="copy">{{$enrollment->middle_name}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>last Name:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_lname" id="spn_lname_val" class="copy">{{$enrollment->last_name}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Suffix:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_suffix" id="spn_suffix_val" class="copy"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Date of birth:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_dob" id="spn_dob_val" data-dob="1945-04-05"
                                  class="copy">{{$enrollment->dob}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>SSN:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_ssn" id="spn_ssn_val" class="copy">{{$enrollment->ssn_4}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_mdn" id="spn_mdn_val"
                                  class="copy">{{$enrollment->phone_number?:'--'}}</span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table>
                <tbody>
                <tr>
                    <td>Email ID:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_email" id="spn_email_val" class="copy">{{$enrollment->email?:'--'}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_num_serv_add1" id="spn_num_serv_add1_val" class="copy">
                                <span style="color:red"><b>{{$enrollment->address_1}}</b></span>
                                <span>{{$enrollment->address_2}}</span>
                            </span>
                        </div>
                        <span style="" id="spn_num_serv_add2_val"> </span>
                    </td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_city" id="spn_city_val" class="copy">{{$enrollment->city}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_state" id="spn_state_val" class="copy">{{$enrollment->state}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>ZIP:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_zip" id="spn_zip_val" class="copy">{{$enrollment->zip_code}}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Address Type:</td>
                    <td>--</td>
                </tr>
                <tr>
                    <td>Valid Address:</td>
                    <td>--</td>
                </tr>
                <tr>
                    <td>Vacant Address:</td>
                    <td>--</td>
                </tr>
                </tbody></table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table>
                <tbody>
                <tr id="spn_i-up">
                    <td>Identity Proof:</td>
                    <td><span id="spn_id_proof">--</span></td>
                </tr>
                <tr id="spn_e-up">
                    <td>Eligibility proof:</td>
                    <td><span id="spn_eligibility_proof">--</span></td>
                </tr>
                <tr>
                    <td>Eligibility Program:</td>
                    <td>{{$enrollment->program_code}}</td>
                </tr>
                <tr>
                    <td>Beneficiary Name:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_ben_fname" id="spn_ben_fname_val" class="copy">--</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Beneficiary DOB:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_ben_birthdate" id="spn_ben_birthdate_val" class="copy">--</span>
                            <span id="spn_ben_birthdate" class="tooltiptext"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Beneficiary SSN:</td>
                    <td>
                        <div class="tooltip_review">
                            <span data-spn="spn_ben_ssn_number" id="spn_ben_ssn_number_val" class="copy">--</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Beneficiary:</td>
                    <td>--</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table>
                <tbody>
                <tr>
                    <td>Plan Name:</td>
                    <td>{{$plan->name}}</td>
                </tr>
                <tr>
                    <td>Agent ID:</td>
                    <td>{{$enrollment->agent_id}}</td>
                </tr>
                <tr>
                    <td>Tribal:</td>
                    <td>{{$enrollment->is_tribal ? 'Y' : 'N'}}</td>
                </tr>
                <tr>
                    <td>Rural:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>IEH Form:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>National Verifier:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Enrollment Type:</td>
                    <td>-</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .enrollment-card .card {
        margin-right: 5px;
        width: 18rem;
    }

    .enrollment-card td {
        padding: 2px;
        text-transform: capitalize;
        font-size: 13px;
        color: rgba(0, 0, 0, .87);
        vertical-align: top;
        line-height: 20px;
    }

    .enrollment-card tr > td:first-child {

    }

    .enrollment-card tr > td:last-child {
        font-weight: bold;
    }
</style>

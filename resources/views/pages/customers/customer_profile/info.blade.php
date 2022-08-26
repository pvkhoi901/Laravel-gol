@extends('layout.master')

@section('content')


{{ Form::text('customer_id', $model->id, ['class' => 'form-control d-none', 'id' => 'customer_id', ]) }}


<div class="content">
    <div class="container-fluid">
        <div class="">
            <h4 class="mt-0 header-title mb-3">Customer</h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @csrf

                            <div class="row">
                                <div class="col-lg-10 col-md-9">
                                    <div class="box no_box_brd box-primary">
                                        <div class="box-body" style="overflow: hidden; height: 1229px;"
                                            id="customer_profile_main">


                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="cust_box">
                                                        <div class="cst_head">
                                                            <strong style="font-size: 18px;"><i
                                                                    class="fa fa-info"></i></strong>
                                                            <h3 class="cust_box_title">Customer Information</h3>
                                                        </div>
                                                        <p align="left" style="margin-bottom:0;">

                                                        </p>
                                                        <table class="table table-striped customer_information">
                                                            <tbody>

                                                                <tr>

                                                                    <th>
                                                                        EBB Qualify
                                                                    </th>
                                                                    <td class="sms_wrapper">
                                                                        <span data-toggle="tooltip"
                                                                            data-original-title="2021-25-Aug"
                                                                            data-placement="top">2021-08-25
                                                                            07:24:11</span>
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <th>Service Address </th>
                                                                    <td>
                                                                        2601 MADISON AVE APT 1005 <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDNoKbicB0RL2LFiRMx1tSsZ926M+7qGUXpShTSHNxWM+MT4gQnHoMiHOVcm+mhDU9RGVg7wtwGZzdxWdQSBT2Ga"
                                                                            class="customer_information_edit_icon"
                                                                            title="Update Billing Address"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>BALTIMORE</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>State</th>
                                                                    <td>MD</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Zip</th>
                                                                    <td>21217</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Password
                                                                    </th>
                                                                    <td class="sms_wrapper">
                                                                        ******
                                                                        <input type="button"
                                                                            class="btn btn-primary btn-sm  sendSMSV"
                                                                            value="Send SMS" id="send_sms_notification"
                                                                            data-cust-id="FpH4qOKEzDMh8IMWCnUa98b+caG+qcrrmu2tZZbsqLI="
                                                                            title="Send Password SMS">
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>Alternate Ph</th>
                                                                    <td>
                                                                        455-454-5454 <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDPrGlHjhUoaBzzw41evbQ4O9vKTWkrofBIExcCKar80rECMb4Vz4m88XQpMfhFQUNhVvi/2tKVU/njfUsuMPTszrySv0CI6jf8Wp38+6mp3xxCZ6CuBzPX8vPzzzeABGqY="
                                                                            class="customer_information_edit_icon"
                                                                            title="Alternate Ph"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email </th>
                                                                    <td>
                                                                        JOHNKR@GMAIL.COM <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDPrGlHjhUoaBzzw41evbQ4O9vKTWkrofBIExcCKar80rECMb4Vz4m88XQpMfhFQUNhVvi/2tKVU/njfUsuMPTszCVbyZ8x2gfk48gL7N+FqF5fAEXJetBlqDsnp2cGdyHs="
                                                                            class="customer_information_edit_icon"
                                                                            title="Email"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Mailing Address </th>
                                                                    <td>
                                                                        2601 MADISON AVE APT 1005 <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDNoKbicB0RL2LFiRMx1tSsZ926M+7qGUXpShTSHNxWM+MT4gQnHoMiHOVcm+mhDU9RGVg7wtwGZzdxWdQSBT2Ga"
                                                                            class="customer_information_edit_icon"
                                                                            title="Update Billing Address"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        BALTIMORE </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>State</th>
                                                                    <td>
                                                                        MD </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Zip</th>
                                                                    <td>
                                                                        21217 </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address Type</th>
                                                                    <td>
                                                                        Permanent <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDNoKbicB0RL2LFiRMx1tSsZ926M+7qGUXpShTSHNxWM+MT4gQnHoMiHOVcm+mhDU9RGVg7wtwGZzdxWdQSBT2Ga"
                                                                            class="customer_information_edit_icon"
                                                                            title="Update Address Type"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tribal (Y/N) </th>
                                                                    <td>
                                                                        N </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Customer SSN (PC253)</th>
                                                                    <td>8544</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Customer DOB (PC253)</th>
                                                                    <td>
                                                                        <span data-toggle="tooltip"
                                                                            data-original-title="1999-05-Mar"
                                                                            data-placement="top">1999-03-05</span>
                                                                    </td>
                                                                </tr>



                                                                <tr>
                                                                    <th>A/U Name</th>
                                                                    <td>
                                                                        <a href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDPrGlHjhUoaBzzw41evbQ4O9vKTWkrofBIExcCKar80rPjyG2B/30jYGZLuqYoKUH52tfxlyr84Ns1mvhxnPtSQ"
                                                                            class="customer_information_edit_icon"
                                                                            title="Update Authorized User"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>



                                                                <tr>
                                                                    <th>DID No</th>
                                                                    <td><span id="did_span">N/A</span><a
                                                                            href="javascript:void(0);"
                                                                            class="customer_information_edit_icon"
                                                                            id="addUpdateDid" title="Update DID"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Company</th>
                                                                    <td>Cintex TX</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Account # (PC608)</th>
                                                                    <td>972</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Current Balance </th>
                                                                    <td>0.00</td>
                                                                </tr>






                                                            </tbody>
                                                        </table>
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="cust_box">
                                                        <div class="cst_head">
                                                            <strong style="font-size: 18px;"><i
                                                                    class="fa fa-mobile"></i></strong>
                                                            <h3 class="cust_box_title">Line Information</h3>
                                                        </div>
                                                        <p align="left" style="margin-bottom:0;">
                                                        </p>
                                                        <table class="table table-striped customer_information"
                                                            id="line_information">
                                                            <tbody>
                                                                <tr>
                                                                    <th>MDN</th>
                                                                    <td>
                                                                        410-258-7540 <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDPrGlHjhUoaBzzw41evbQ4O9vKTWkrofBIExcCKar80rH1DH1h8/itdatebUyzTgcge4B8j5oyyDJvKTaL90AbBnxLEKCPeUf/bzh7E/WQ1/HNKzbKFqMov1gYdfSFHwFI="
                                                                            class="customer_information_edit_icon"
                                                                            title="Update MDN"><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>SIM/ESN</th>
                                                                    <td>
                                                                        35939406741307 <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDPrGlHjhUoaBzzw41evbQ4O9vKTWkrofBIExcCKar80rH1DH1h8/itdatebUyzTgcge4B8j5oyyDJvKTaL90AbBVAuqIcn/8meIzjIPG8KCp0PiXy7ax6cfyiMDd7i7/Mg="
                                                                            class="customer_information_edit_icon"
                                                                            title="Update SIM/ESN "><i
                                                                                class="fa fa-fw fa-edit"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Make &amp; Model</th>
                                                                    <td>APPLE 11</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Ported MDN</th>
                                                                    <td>
                                                                        NO</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Acc. Type</th>
                                                                    <td>
                                                                        EBB </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Vcare Plan</th>
                                                                    <td>
                                                                        EBB Lifeline Plan <a
                                                                            href="https://demo-cintexwireless.vcarecorporation.com/index.php?mh28c86XI+vOcymOFxdV8E3yaIAbOgbgxeURev9HEMgaRsvwRifKxjQyXP+Szl9Roiq0ZeIAUM9UZDwOT9BQ4y5sl+jQBqTH21waWGy4XzrKtr6CzbsaTGRtrZYqN9TN"
                                                                            class="customer_information_edit_icon"
                                                                            title="Change Plan"><i
                                                                                class="fa fa-fw fa-edit"></i></a><br>


                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Plan Details</th>
                                                                    <td>
                                                                        3000 Talk &amp; 25000 Text &amp; 25000MB Data
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Plan Price</th>
                                                                    <!--<td></td>-->
                                                                    <td>$ 0.00</td>
                                                                </tr>





                                                                <tr>
                                                                    <th>Carrier</th>
                                                                    <td>
                                                                        SPR <input type="button"
                                                                            class="btn btn-primary btn-sm pull-right load_career"
                                                                            value="Live Status (PC499)">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Query Usage</th>
                                                                    <td>
                                                                        SPR </td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>SPRINT LIVE
                                                                                STATUS&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>CANCELLED</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>ACTIVATION
                                                                                DATE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-25-Aug"
                                                                            data-placement="top">08/25/2021</span> </td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>PLANID&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>TXMPLAN4</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>VCARE OCS LIVE
                                                                                STATUS&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>ACTIVE</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>EXPIRATION
                                                                                DATE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-03-Oct"
                                                                            data-placement="top">2021-10-03
                                                                            23:59:59</span></td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>NEXT
                                                                                RENEWAL&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-03-Oct"
                                                                            data-placement="top">2021-10-03
                                                                            23:59:59</span></td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>TOTAL
                                                                                BALANCE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td class="sms_wrapper"><input type="button"
                                                                            class="btn btn-primary btn-sm pull-right sendSMSV"
                                                                            value="Send Balance Detail SMS"
                                                                            id="send_sms_notification"
                                                                            onclick="sendBalanceSMSNotification(972)"
                                                                            title="Send Balance SMS">3000</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>SMS
                                                                                BALANCE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>25000</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>DATA
                                                                                BALANCE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>24.41 GB</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>ZOOM
                                                                                BALANCE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>24.41 GB </td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>ESN&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>089886413407607047</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>ESNHEX&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>35939406741307</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>CSA&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>APCBAL410</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>MSID&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>000004102585299 </td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title=""><span>MDN EXPIRY
                                                                                DATE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-03-Oct"
                                                                            data-placement="top">2021-10-03
                                                                            23:59:59</span></td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>CARRIER&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>SPR</td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>FEATURE
                                                                                CODE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td></td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>ESN-MSL
                                                                                CODE&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>
                                                                        <font color="#d737e3" size="2"><b>893571</b>
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                                <tr class="carrier_status">
                                                                    <th><span title="" data-toggle="tooltip"
                                                                            data-placement="top"><span>MODEL
                                                                                ID&nbsp;<span><span></span></span></span></span>
                                                                    </th>
                                                                    <td>BOOST LG LS665 XCVR SGL</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p></p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6">
                                                    <div class="cust_box">
                                                        <div class="cst_head">
                                                            <strong style="font-size: 12px;"><i
                                                                    class="fa fa-file-o"></i></strong>
                                                            <h3 class="cust_box_title">Other Information</h3>
                                                        </div>
                                                        <p align="left" style="margin-bottom:0;">
                                                        </p>
                                                        <table class="table table-striped customer_information">
                                                            <tbody>



                                                                <tr>
                                                                    <th>Wallet Balance</th>
                                                                    <td>0</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Order by</th>
                                                                    <td>Devteam</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Master Agent ID</th>
                                                                    <td>Corporate_Master</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Agent Name</th>
                                                                    <td>DEVTEAM DEVTEAM(Devteam)</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Enrollment ID</th>
                                                                    <td>EPCX7321</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>NLAD Subscriber ID</th>
                                                                    <td>UHF7SWSXT</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Customers Consent</th>
                                                                    <td>Yes</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Approved by</th>
                                                                    <td>National Verifier</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Source</th>
                                                                    <td>ENROLLMENT_PORTAL</td>
                                                                </tr>
                                                                <!-- Add by Neerj start-->
                                                                <!-- Add by Neerj end -->
                                                                <tr>
                                                                    <th>Application Approval </th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-25-Aug"
                                                                            data-placement="top">2021-08-25
                                                                            07:24:11</span></td>
                                                                </tr>


                                                                <tr>
                                                                    <th> Lifeline Activation </th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-25-Aug"
                                                                            data-placement="top">2021-08-25
                                                                            07:25:29</span></td>
                                                                </tr>


                                                                <tr>
                                                                    <th>Disconnection</th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-03-Sep"
                                                                            data-placement="top">2021-09-03
                                                                            09:00:43</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Disconnection Reason</th>
                                                                    <td>Deceased</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Reconnection Date</th>
                                                                    <td><span data-toggle="tooltip"
                                                                            data-original-title="2021-03-Sep"
                                                                            data-placement="top">2021-09-03
                                                                            09:02:38</span></td>
                                                                </tr>






                                                                <tr>
                                                                    <th>Annual Income (PC506)</th>
                                                                    <td>0</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>No. of People in Household (PC507)</th>
                                                                    <td>0</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>House Hold</th>
                                                                    <td>Y</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Lifeline Program Participation</th>
                                                                    <td>
                                                                        1) Supplemental Nutrition Assistance Program
                                                                        (SNAP) (f/k/a
                                                                        Food Stamps)<br> </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="text-right" id="customer_profile_more"
                                                style="cursor: pointer; color: rgb(0, 172, 214); display: none;">
                                                More...
                                            </div>
                                            <div class="text-right" id="customer_profile_less"
                                                style="cursor: pointer; color: rgb(0, 172, 214);">
                                                Less...
                                            </div>
                                        </div>
                                        <div id="notes_window_wrapper"></div>
                                        <div class="row">
                                            <div class="col-md-6 cus_note_outer">
                                                <div class="box box-success no_box_brd">
                                                    <div class="box-header cst_nthead_show">
                                                        <div class="row" style="margin-bottom: 9px;
                                border-bottom: 1px solid #ccc;
                                padding: 0px 0px 9px 0px;">
                                                            <div class="col-md-7 col-sm-6 col-xs-6">
                                                                <h3 class="box-title">Customer Notes</h3>
                                                            </div>
                                                            <div
                                                                class="col-md-5 col-sm-6 col-xs-6 customer_notes_button">
                                                                <span id="refreshCSR" data-toggle="tooltip"
                                                                    data-original-title="Refresh Notes"
                                                                    data-placement="top"><i class="fa fa-refresh"
                                                                        aria-hidden="true"></i></span>

                                                                <span id="downloadNotes" onclick="downloadNotes();"
                                                                    style="" data-toggle="tooltip"
                                                                    data-original-title="Download Notes"
                                                                    data-placement="top"><i class="fa fa-download"
                                                                        aria-hidden="true"></i></span>
                                                                <span class="cutomer_img" data-toggle="tooltip"
                                                                    data-original-title="Expand Notes"
                                                                    data-placement="top">
                                                                    <i class="fa fa-expand" aria-hidden="true"></i>
                                                                </span>

                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-6"><button
                                                                    id="archiveNotes"
                                                                    class="btn btn-primary btn-sm">View Archive
                                                                    Notes</button></div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6"><button
                                                                    id="display_notes"
                                                                    class="btn btn-primary btn-sm pull-right"
                                                                    data-toggle="modal"
                                                                    data-target="#display_customer_notes">Display
                                                                    Notes</button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="table-hover table-striped">
                                                        {{ $dataTable->table() }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 cus_note_outer">
                                                <div class="box no_box_brd">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Add New Note (PC83)</h3>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12 div_add_customer_note">
                                                                    <div class="form-group div_note_type">
                                                                        @include('pages.system.note_type.note_types')
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <a title="Add New Note Type" href="javascript:;" class="" data-toggle="modal"
                                                                        data-target=".bd-example-modal-lg"><b><i
                                                                                    class="fa fa-fw fa-plus"></i>Add New
                                                                                Note Type
                                                                                (PC450)</b></a>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        {{ Form::text('carrier_id', null, ['class' => 'form-control ', 'id' => 'carrier_id', 'placeholder' => 'Caller ID' ]) }} 
                                                                    </div>

                                                                    <div class="form-group">
                                                                        {{ Form::textarea('customer_notes', null, ['class' => 'form-control ', 'id' => 'customer_notes', 'placeholder' => 'Customer Notes' ]) }}
                                                                    </div>

                                                                    <div class="form-group">
                                                                        {{ Form::select('priority', $model::PRIORITY, null, ['class' => 'form-control select2', 'id' => 'priority']) }}
                                                                    </div>

                                                                    <button type="button" value="NOTE_SUBMIT"
                                                                    name="notesubmit"  class="btn btn-info pull-right btn btn-primary btn_add_note_customer"
                                                                    >Add Note</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            #notes_window_wrapper .row {
                                                margin-left: 0px;
                                                margin-right: 0px;
                                            }

                                            .customer_notes_button {
                                                text-align: right;
                                            }

                                            .customer_notes_button span {
                                                font-size: 12px !important;
                                                display: inline-block;
                                                margin-right: 5px;
                                                border: 1px solid #0297c5;
                                                padding: 4px;
                                                border-radius: 5px;
                                                cursor: pointer;
                                                margin-left: 5px;
                                                color: #0093ff;
                                            }

                                            #activity_div {
                                                height: 335px;
                                            }

                                            #comment_div,
                                            #activity_div {
                                                overflow: auto;
                                                position: relative;
                                            }

                                            #comment_div {}

                                            .comment_div_height {
                                                max-height: 350px;
                                                padding-top: 19px;
                                            }

                                            .timeline {
                                                position: relative;
                                                margin: 0 0 30px 0;
                                                padding: 0;
                                                list-style: none;
                                            }

                                            /*#notes-window-modal .modal-body{
                                max-height: 830px;
                                overflow: hidden;
                                height: 762px;
                                padding-top: 23px !important;
                            }*/
                                            #notes_window_wrapper .modal-body {
                                                max-height: 500px;
                                            }

                                            .timeline>li {
                                                position: relative;
                                                margin-right: 10px;
                                                margin-bottom: 15px;
                                            }

                                            .timeline>li>.timeline-item {
                                                -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
                                                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
                                                border-radius: 3px;
                                                margin-top: 0;
                                                background: #fff;
                                                color: #444;
                                                margin-left: 60px;
                                                margin-right: 15px;
                                                padding: 0;
                                                position: relative;
                                            }

                                            .border_right_1px {
                                                border-right: 1px solid #eee;
                                            }

                                            .border_top_1px {
                                                border-top: 1px solid #eee;
                                            }

                                            #add_comment_message,
                                            #add_comment_error {
                                                margin-bottom: 0px !important;
                                                display: none;
                                            }

                                            .cutomer_notes_text {
                                                max-height: 100px;
                                                overflow: auto;
                                            }

                                            span.time.void_change {
                                                margin-top: -8px;
                                            }

                                            .child_notes_tr {
                                                display: none;
                                            }

                                            .panel-default>.panel-heading {
                                                color: #333;
                                                background-color: #fff;
                                                border-color: #e4e5e7;
                                                padding: 0;
                                                -webkit-user-select: none;
                                                -moz-user-select: none;
                                                -ms-user-select: none;
                                                user-select: none;
                                            }

                                            .panel-default>.panel-heading a {
                                                display: block;
                                                padding: 10px 15px;
                                            }

                                            .panel-default>.panel-heading a:after {
                                                content: "";
                                                position: relative;
                                                top: 1px;
                                                display: inline-block;
                                                font-family: 'Glyphicons Halflings';
                                                font-style: normal;
                                                font-weight: 400;
                                                line-height: 1;
                                                -webkit-font-smoothing: antialiased;
                                                -moz-osx-font-smoothing: grayscale;
                                                float: right;
                                                transition: transform .25s linear;
                                                -webkit-transition: -webkit-transform .25s linear;
                                            }

                                            .panel-default>.panel-heading a[aria-expanded="true"] {
                                                background-color: #eee;
                                            }

                                            .panel-default>.panel-heading a[aria-expanded="true"]:after {
                                                content: "\2212";
                                                -webkit-transform: rotate(180deg);
                                                transform: rotate(180deg);
                                            }

                                            .panel-default>.panel-heading a[aria-expanded="false"]:after {
                                                content: "\002b";
                                                -webkit-transform: rotate(90deg);
                                                transform: rotate(90deg);
                                            }

                                            .notesCreateInWrp {
                                                cursor: pointer;
                                            }

                                            /* css for diaplay notes pop up window */
                                            .accordian_table a[aria-expanded="true"] {
                                                background-color: #eee;
                                            }

                                            .accordian_table a {
                                                padding: 6px 10px;
                                            }

                                            .accordian_table a,
                                            .accordian_table a[aria-expanded="true"] {
                                                background: transparent !important;
                                                color: #41bbae;
                                            }

                                            .accordian_table a {
                                                display: block;
                                                color: #333;
                                                padding: 0px 0px;
                                            }

                                            .accordian_table a[data-toggle="collapse"]::before {
                                                content: "";
                                                font-weight: 400;
                                                font-size: 14px;
                                            }

                                            .accordian_table a[aria-expanded="true"]:after {
                                                left: 4px;
                                                font-weight: 400;
                                                font-size: 11px;
                                            }

                                            .accordian_table a[aria-expanded="true"]:after {
                                                content: "\2212";
                                                -webkit-transform: rotate(180deg);
                                                transform: rotate(180deg);
                                            }

                                            .accordian_table a:after {
                                                content: "";
                                                position: relative;
                                                top: 5px;
                                                display: inline-block;
                                                font-family: 'Glyphicons Halflings';
                                                font-style: normal;
                                                font-weight: 400;
                                                line-height: 1;
                                                -webkit-font-smoothing: antialiased;
                                                -moz-osx-font-smoothing: grayscale;
                                                float: right;
                                                transition: transform .25s linear;
                                                -webkit-transition: -webkit-transform .25s linear;
                                            }

                                            .accordian_table a.collapsed[data-toggle="collapse"]::before {
                                                content: "";
                                                font-weight: 400;
                                                font-size: 14px;
                                            }

                                            .accordian_table a[data-toggle="collapse"]::before {
                                                content: "";
                                                font-weight: 400;
                                                font-size: 14px;
                                            }

                                            .accordian_table a[aria-expanded="false"]:after {
                                                font-size: 12px;
                                                font-weight: 400;
                                                padding: 0;
                                                left: 5px;
                                            }

                                            .accordian_table a[aria-expanded="false"]:after {
                                                content: "\002b";
                                                -webkit-transform: rotate(90deg);
                                                transform: rotate(90deg);
                                            }

                                            .accordian_table a:after {
                                                content: "";
                                                position: relative;
                                                top: 1px;
                                                display: inline-block;
                                                font-family: 'Glyphicons Halflings';
                                                font-style: normal;
                                                font-weight: 400;
                                                line-height: 1;
                                                -webkit-font-smoothing: antialiased;
                                                -moz-osx-font-smoothing: grayscale;
                                                float: right;
                                                transition: transform .25s linear;
                                                -webkit-transition: -webkit-transform .25s linear;
                                            }

                                            .accordian_table a.accordion-toggle::before,
                                            .accordian_table a[data-toggle="collapse"]::before {
                                                content: "" !important;
                                            }

                                            .accordian_table a.accordion-toggle.collapsed::before,
                                            .accordian_table a.collapsed[data-toggle="collapse"]::before {
                                                content: "" !important;
                                            }

                                            .accordian_table a.collapsed:after {
                                                content: "\002b";
                                                font-size: 9px;
                                            }
                                        </style>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <a class="quik_icon" id="QuickIcon"> </a>
                                    <div class="box no_box_brd quick_links_fixed" style="top: 140px;">
                                        <div class="box-header with-border telgoo_qk_lnk">
                                            <h3 class="box-title">Quick Links</h3>
                                            <div class="box-tools pull-right"> </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="products-list product-list-in-box quk_links">
                                                        <li class="item"> <a
                                                                href="index.php?qhxTaFHXw4MFO5sCTChhAHg7lJ/R8B/WSVuvNwY+4cYn1Ti5cPPyi+TT8yGMI/9fcTR1crmufWJpJxvHJhqkCzayn+x/qTwW94U8sy2m2xw0OBm/7SPnVpz6hzEA8RUb"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Add Topup -
                                                                Minute/Text (PC60)</a> </li>

                                                        <li class="item"> <a
                                                                href="index.php?1xiHt2om90VRnhw0S2Kt0SKMc3WpkEc459VE3N7igbTWZ8CLLztJ9HjjrZxFwxv+H15bwuseURvlHEhBcmOXiXXsxlu5A9n8t9IAnJnYVVtfJhMdHRgET969PmFmm4dT"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Add Data Topup
                                                                (PC64)</a> </li>
                                                        <li class="item"> <a
                                                                href="index.php?mh28c86XI+vOcymOFxdV8E3yaIAbOgbgxeURev9HEMgaRsvwRifKxjQyXP+Szl9Roiq0ZeIAUM9UZDwOT9BQ4y5sl+jQBqTH21waWGy4XzrKtr6CzbsaTGRtrZYqN9TN"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Plan Change
                                                                (PC77)</a> </li>

                                                        <li class="item"> <a
                                                                href="index.php?eW4MnEYYpgmOaTWf7ERlLxzCagqxv6qcfyYmD+AlvSfqbhmLdVao6yVjyhMONagoFk7giVeNy77a9RP4KhE4evPA58Odvp+5eqmf/ASYuSrZgA4wDgyAYK4CE31EZjAQ"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Upgrade To
                                                                Family Plan (PC621)</a> </li>

                                                        <li class="item"> <a
                                                                href="index.php?cnoh8l5Ohct1Hnc823Kaz8URNZhnBzdZxSN8pupDdtWfxRqSadqW9spq/YqVAF0Byc0eATBpxn46lNzRxLAvnCoIFDH97LH1xQHwpHq4qhFMHjE1mdYOJPtXELqyPx77"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Plan Renew
                                                                (PC519)</a> </li>




                                                        <li class="item"> <a
                                                                href="index.php?Oq1mcRHzcKAUtpDUXw071DUV9diT1xG5OPzokiq+lH5Xtv87MwvTW7bNlTAKinWEy4i8rVh+ICgYpN82PhF78bfUXwZKfGZNX9j2QrkCBSAPtRwweXxCZzDcLGtfzdYx"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Equipment
                                                                Purchase (PC69)</a></li>

                                                        <li class="item"> <a
                                                                href="index.php?Py9Z7BjZxhcWbH0HWjoBXdYV4dEzWRG1/FT3M3tKwA2acLhYnd/D4e82RAvdvdNC83xpndQdy8j1H6A1sHFCeA=="
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Usage (PC254)
                                                            </a> </li>

                                                        <li class="item"> <a
                                                                href="index.php?paSa2pKioYOVAs5yVyR/mAXt6ukJtN3vn5UDFzr1Lej4zQujXBrdu76VdkBrz+5AMFhZit4qyriBFVq0aTZM/7RXzc3DAeFFr4fnrweFqyvUQg6plgnWyW7i0G37Bdbo"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">View Files
                                                                (PC80) </a> </li>

                                                        <!--
                                                                                                                <li class="item"> <a href="index.php?lAVkOb/ixrtMQf5BzgRWi6LQjsTiig2sdAHDTVSdtOe0x1xW2rJPX5Ad4e4u6AevuR5xFjMF3aVfRISRP8D+bg==" style="cursor:pointer;" id="" class="hvr-back-pulse ">Pin Lookup (PC217) </a> </li>
                                                                            -->
                                                        <li class="item"> <a
                                                                href="index.php?3SrPyK02SSQwxJ/zDkZRqfq/U3fWecrHuEm2tGj1SDPrGlHjhUoaBzzw41evbQ4O9vKTWkrofBIExcCKar80rGIBVIdb+GnWuvGg24D7Eb4x2L/C27J4QvSMvgQTtr/b"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Features
                                                                (PC92) </a> </li>
                                                        <li class="item"> <a
                                                                href="index.php?qn3ZMJmG/y6E858Y0QcAUHDzJlt5vLDZDwfWpkPuBiJTQpBCahPuFej7NU80NpZiPZEnWzV4qlrKAJ1Cyx8LvPXUYFPAq/SfD931R6zmVgMzqxuxF+tgkcQDWYK1TPnO"
                                                                style="cursor:pointer;" id=""
                                                                class="hvr-back-pulse ">Existing
                                                                Subscriber Portin (PC343)</a> </li>




                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right mt-5">
                <a class="btn btn-secondary" href="{{ route('customer_profile.index') }}">Back</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal_add_note_type" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form_note_type">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Note Type Name <span class="text-danger">*</span></label>
                                    {{ Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Name', 'required' => true]) }}
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes <span class="text-danger">*</span></label>
                                    {{ Form::textarea('notes', null, ['class' => 'form-control required', 'id' => 'notes', 'placeholder' => 'Note']) }}
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_new_note_type">Add Note Type</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg modal_customer_detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">View Customer Notes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body modal_content_detail">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

      </div>
    </div>
  </div>



@endsection

@push('plugin-scripts')
<script src="{{ mix('js/pages/customer_edit.js') }}"></script>

{{ $dataTable->scripts() }}
@endpush
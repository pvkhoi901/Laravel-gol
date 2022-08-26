<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Base\CrudParentController;
use App\Mail\CanvaseeMail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;

class EmailController extends CrudParentController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.email.index');
    }

    public function emailCustom()
    {
        return view('pages.email.index_custom');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function switchTheme($theme)
    {
        User::find(Auth::id())->update([
            'theme' => $theme,
        ]);

        return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailTemplate()
    {
        return view('email.canvasee_template');
    }

    public function sendEmail(Request $request)
    {


        $email_content = $request->email_content ?? "";
        $email_title = $request->email_title ?? "";


        $email_received = $request->email_received ?? "";
        $email_cc = $request->email_cc ?? "";
        $email_bcc = $request->email_bcc ?? "";


        $data_email = $this->checkEmail($email_received);
        $data_email_cc = $this->checkEmail($email_cc);
        $data_email_bcc = $this->checkEmail($email_bcc);


        if ($email_title == "") {
            return response()->json([
                'status'  => 201,
                'message' => "Please Input Email Title",
                'class' => "#email_title",
            ]);
        }


        if (count($data_email) > 0) {
            Mail::send(array(), array(), function ($message) use ($email_content, $data_email, $email_title, $data_email_cc, $data_email_bcc) {
                $message->to($data_email)
                    ->cc($data_email_cc)
                    ->bcc($data_email_bcc)
                    ->subject($email_title)
                    ->setBody($email_content, 'text/html');
            });
            return response()->json([
                'status'  => 200,
                'message' => 'Success',
            ]);
        } else {
            return response()->json([
                'status'  => 201,
                'message' => "Please Input Email",
                'class' => "#email_received",
            ]);
        }
    }


    public function sendEmailCustom(Request $request)
    {

        $email_content = $request->email_content ?? "";
        $email_title = $request->email_title ?? "";
        $customer_region = $request->customer_region ?? "";


        $email_received = $request->email_received ?? "";
        $email_cc = $request->email_cc ?? "";
        $email_bcc = $request->email_bcc ?? "";


        $data_email = $this->checkEmail($email_received);
        $data_email_cc = $this->checkEmail($email_cc);
        $data_email_bcc = $this->checkEmail($email_bcc);


        if ($email_title == "") {
            return response()->json([
                'status'  => 201,
                'message' => "Please Input Email Title",
                'class' => "#email_title",
            ]);
        }

        $details = [
            'title' => $email_title,
            'body' => $email_content
        ];

      

        if (count($data_email) > 0) {
            // Mail::send(array(), array(), function ($message) use ($email_content, $data_email, $email_title, $data_email_cc, $data_email_bcc) {
            //     $message->to($data_email)
            //         ->cc($data_email_cc)
            //         ->bcc($data_email_bcc)
            //         ->subject($email_title)
            //         ->setBody($email_content, 'text/html');
            // });

            \Mail::to($data_email)->send(new CanvaseeMail($details, $email_title));
            return response()->json([
                'status'  => 200,
                'message' => 'Success',
            ]);
        } else {
            return response()->json([
                'status'  => 201,
                'message' => "Please Input Email",
                'class' => "#email_received",
            ]);
        }

        return response()->json([
            'status'  => 200,
            'message' => 'Success',
        ]);
    }



    public function checkEmail($email)
    {
        $data_emails = [];
        $filtere_emails = [];
        try {

            $data_emails = explode(",", $email);
            $data_emails =  array_values($data_emails);
        } catch (\Throwable $th) {
        }

        foreach ($data_emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $filtere_emails[] = $email;
            }
        }


        return $filtere_emails;
    }

    public function callApiGetCustomer($data_search)
    {
        $headers = array(
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env("API_GATEWAY", "") . "/api/get_email_customer");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_search));
        $result = curl_exec($ch);
        curl_close($ch);
        $customer_data = json_decode($result, true);
        return $customer_data;
    }


    public function sendEmailToCustomer($data_search)
    {
        $headers = array(
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, env("API_GATEWAY", "") . "/api/get_email_customer");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_search));
        $result = curl_exec($ch);
        curl_close($ch);
        $customer_data = json_decode($result, true);
        return $customer_data;
    }
}

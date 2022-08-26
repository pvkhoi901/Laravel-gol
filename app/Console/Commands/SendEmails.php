<?php

namespace App\Console\Commands;

use App\Http\Controllers\Email\EmailController;
use App\Mail\CanvaseeMail;
use App\Models\EmailMarketing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     *  php artisan send_email:for_notification
     * @var string
     */
    protected $signature = 'send_email:for_notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        var_dump(111111111);

        $mails =  EmailMarketing::where("id", ">", 2)->get();
        foreach ($mails as $mail) {
            $email_content = $mail->email_content ?? "";
            $email_title = $mail->email_title ?? "";
            $customer_region = $mail->customer_region ?? "";

            var_dump($customer_region);

            $details = [
                'title' => $email_title,
                'body' => $email_content
            ];

            if ($customer_region != "") {
                $data_search = [
                    "page" => 1,
                    "size" => 10,
                    "country_code" => $customer_region,
                    "key" => "users.id",
                ];
                $customer_data = $this->callApiGetCustomer($data_search);

                $all_email_send = [];
                if ($customer_data['status'] == 200) {
                    $data = $customer_data['data'];
                    $datas = $data['datas'];
                    if (count($datas)  > 0) {
                        $data_customer_send_email = [];
                        foreach ($datas as $customer) {
                            $email = $customer['email'] ?? "";
                            $email_social = $customer['email_social'] ?? "";
                            if ($email != "" && !in_array($email, $all_email_send)) {
                                $all_email_send[] = $email;
                                $data_customer_send_email[] = $email;
                            }


                            if ($email_social != "" && !in_array($email_social, $all_email_send)) {
                                $all_email_send[] = $email_social;
                                $data_customer_send_email[] = $email_social;
                            }
                        }

                        if (count($data_customer_send_email) > 0) {
                            Mail::to($data_customer_send_email)->send(new CanvaseeMail($details, $email_title));
                            sleep(10);
                        }

                        // Send xong lai call tiep

                        $next_page  =   $data['next_page'];
                        while ($next_page > 0) {
                            $data_search = [
                                "page" => $next_page,
                                "size" => 10,
                                "country_code" => $customer_region,
                                "key" => "users.id",
                            ];
                            $customer_data = $this->callApiGetCustomer($data_search);

                            $data = $customer_data['data'];
                            $datas = $data['datas'];
                            $next_page  =    $data['next_page'];

                            $data_customer_send_email = [];
                            foreach ($datas as $customer) {
                                $email = $customer['email'] ?? "";
                                $email_social = $customer['email_social'] ?? "";
                                if ($email != "" && !in_array($email, $all_email_send)) {
                                    $all_email_send[] = $email;
                                    $data_customer_send_email[] = $email;
                                }

                                if ($email_social != "" && !in_array($email_social, $all_email_send)) {
                                    $all_email_send[] = $email_social;
                                    $data_customer_send_email[] = $email_social;
                                }
                            }
                            if (count($data_customer_send_email) > 0) {
                                Mail::to($data_customer_send_email)->send(new CanvaseeMail($details, $email_title));
                                sleep(10);
                            }
                        }

                        Log::info($all_email_send);
                    }
                }
            }
        }

        return 0;
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
}

<?php

namespace App\APIResponse;

class Message
{
    private $messages = [
        200 => 'Successfully',
        404 => 'Not found',
        401 => 'Permission denied',
    ];

    public function getMessage($code)
    {
        return $this->messages[$code];
    }

    public function genErrorMessage($messages)
    {
        $msg = '';
        if (!is_object($messages)) {
            $msg = $messages;
        } else {
            $message_array = json_decode(json_encode($messages), true);

            foreach ($message_array as $message) {
                if (is_array($message)) {
                    foreach ($message as $m) {
                        $msg .= "$m\n";
                    }
                } else {
                    $msg .= "$message\n";
                }
            }
        }

        return $msg;
    }
}
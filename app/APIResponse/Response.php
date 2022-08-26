<?php

namespace App\APIResponse;


class Response
{
    public static function API($data, $message = '', $code = 200)
    {
        $message_obj = new Message();
        return response()->json([
            "code"    => $code,
            "message" => ($message) ? ($message_obj->genErrorMessage($message)) : $message_obj->getMessage($code),
            "data"    => $data
        ]);
    }
}
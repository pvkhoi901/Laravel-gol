<?php

use App\Models\Agent;
use GuzzleHttp\Client;
use Illuminate\Http\Response;

use Illuminate\Support\Str;

function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function status_text($status)
{
    return $status ? 'on' : 'off';
}

function status_class($status)
{
    return $status ? 'success' : 'danger';
}

function agent_status($status)
{
    return Agent::AGENT_STATUS[$status];
}

if (!function_exists('apiResponse')) {
    function apiResponse($data = [], $code = Response::HTTP_OK)
    {
        return response()->json($data, $code);
    }
}

if (!function_exists('apiSuccess')) {
    function apiSuccess($data = [], $content = 'Successfully', $code = 200)
    {
        return response()->json([
            'status'  => true,
            'content' => $content,
            'data'    => $data,
        ], $code);
    }
}

if (!function_exists('apiError')) {
    function apiError($content = 'An error occurred', $code = 500, $data = [])
    {
        return response()->json([
            'status'  => false,
            'content' => $content,
            'data'    => $data,
        ], $code);
    }
}


if (!function_exists('readMDNResponse')) {
    function readMDNResponse($res)
    {
        try {
            $xmlObject = simplexml_load_string($res);

            $json = json_encode($xmlObject);
            $data = json_decode($json, true);
            return $data;
        } catch (Exception $ex) {
        }
        return [];
    }
}

if (!function_exists('ChangeNumberViewByCountry')) {
    function ChangeNumberViewByCountry($subscribers = "", $region = '')
    {
        if ($subscribers == '') {
            return FORMAT_BLANK;
        }
        try {
            if ($region == 'us') {
                $new_subscribers = Str::replace("N", "K", $subscribers);
                $new_subscribers = Str::replace("TR", "M", $new_subscribers);
                $new_subscribers = Str::replace("T", "B", $new_subscribers);
            } elseif ($region == 'kr') {
                $new_subscribers = 0;
                if (Str::contains($subscribers, ['N'])) {
                    $subscribers = Str::replace("N", "", $subscribers);
                    $new_subscribers = ($subscribers / 10);
                } else if (Str::contains($subscribers, ['TR'])) {
                    $subscribers = Str::replace("TR", "", $subscribers);
                    $new_subscribers = ($subscribers * 100);;
                } else if (Str::contains($subscribers, ['T'])) {
                    $subscribers = Str::replace("T", "", $subscribers);
                    $new_subscribers = ($subscribers * 10000);;
                }
                if ($new_subscribers > 1) {
                    $new_subscribers = $new_subscribers . "만";
                } else if ($new_subscribers > 0) {
                    $new_subscribers = $subscribers * 10 * 100;
                } else {
                    $new_subscribers = $subscribers;
                }
            } else {
                $new_subscribers = $subscribers;
            }
        } catch (Exception $ex) {
        }
        return $new_subscribers;
    }
}

if (!function_exists('changeIndexView')) {
    function changeIndexView($number = "", $region = '')
    {

        $new_number = '';
        if ($number == '') {
            return FORMAT_BLANK;
        }
        try {

            $last = substr($number, -1);
            if ($last > 3 || $last == 0 || ($number >= 11 && $number <= 19)) {
                $ext = 'th';
            } else if ($last == 3) {
                $ext = 'rd';
            } else if ($last == 2) {
                $ext = 'nd';
            } else {
                $ext = 'st';
            }
            return $number . $ext;
        } catch (Exception $ex) {
        }
        return $new_number;
    }
}

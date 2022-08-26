<?php

/*
|--------------------------------------------------------------------------
| Laravel PHP Facade/Wrapper for the Amazon Data API v3
|--------------------------------------------------------------------------
|
| Here is where you can set your key for Amazon API. In case you do not
| have it, it can be acquired from: https://console.developers.google.com
*/

$list_key = [
    'AIzaSyAF5wjeVP5qX5M_YyqAYMhO4eOVaWl64NA', 'AIzaSyCWY6IhfMG_ZO7RV2FMA_8-Am8gxOQVy1Q',
    'AIzaSyA7YDObUyFrhynko0Qs5CAmGamgIyTu9kE'
];
$random_key = array_rand($list_key, 1);
return [
    'api_key' => env('YOUTUBE_API_KEY', $list_key[$random_key])
];

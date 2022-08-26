<?php

/**
 * @author : dev@gmail.com
 * @version : 1.0
 * @Build by BaoNC
 * @description: Framework building use Laravel
 * @Created at: 2021-03-04
 */

use App\Modules\Email\Controllers\EmailMarketingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth' , 'prefix' => 'email'], function () {
    Route::resource('emailMarketings', EmailMarketingController::class);

    Route::get('/email_custom', [EmailMarketingController::class, "emailCustom"])->name('email.email_custom');
});

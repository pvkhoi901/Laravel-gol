<?php

/**
 * @author : dev@gmail.com
 * @version : 1.0
 * @Build by BaoNC
 * @description: Framework building use Laravel
 * @Created at: 2021-03-04
 */

use Illuminate\Support\Facades\Route;
use App\Modules\Setting\Controllers\LanguagesController;
use App\Modules\Setting\Controllers\SettingController;
use App\Modules\Setting\Controllers\UserManagerController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('languages', LanguagesController::class);
    Route::get('languages/duplicate/{id}', [LanguagesController::class, "duplicateLanguage"])->name('languages.duplicate');;
    Route::get('languages/delete/{id}', [LanguagesController::class, "destroy"])->name('languages.delete');


    Route::resource('settings', SettingController::class);

    Route::resource('user_manager', UserManagerController::class);
    Route::get('user_manager/delete/{id}', [UserManagerController::class, "destroy"])->name('user_manager.delete');
});

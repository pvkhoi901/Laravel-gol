<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrawlData\CrawlDataController;
use App\Http\Controllers\CrawlData\CrawlInfluencerController;
use App\Http\Controllers\YoutubeCategory\YoutubeCategoryController;
use App\Http\Controllers\Manager\CategoryApiController;
use App\Http\Controllers\Manager\ApiDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\LaddingPageController;
use App\Http\Controllers\Manager\ApiDescriptionController;

Auth::routes();


// Route::get('/', [DashboardController::class, "index"]);
Route::get('/', [LoginController::class, "showLoginForm"]);
 

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [DashboardController::class, "index"]);

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('switch-theme/{theme}', [UserController::class, "switchTheme"])->name('switch_theme');
    });

   
    Route::group(['prefix' => 'email'], function () {
        Route::get('/template', [EmailController::class, "index"])->name('email.index');
        // Route::get('/email_custom', [EmailController::class, "emailCustom"])->name('email.email_custom');
        Route::get('email_template', [DashboardController::class, "emailTemplate"])->name('email.email_template');
        Route::post('send', [EmailController::class, "sendEmail"])->name('email.email_send');
        Route::post('email_send_custom', [EmailController::class, "sendEmailCustom"])->name('email.email_send_custom');
    });



    Route::get('routes', function () {
        $routeCollection = Route::getRoutes();

        echo "<table style='width:100%'>";
        echo "<tr>";
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='10%'><h4>Route</h4></td>";
        echo "<td width='10%'><h4>Name</h4></td>";
        echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "<td width='70%'><h4>Path Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            echo "<tr>";
            echo "<td>" . $value->methods()[0] . "</td>";
            echo "<td>" . $value->uri() . "</td>";
            echo "<td>" . $value->getName() . "</td>";
            echo "<td>" . $value->getActionName() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    });



    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

    Route::resource('media_images', App\Http\Controllers\MediaImageController::class);
});

<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('get_shopee', [ApiController::class, "getShopee"]);

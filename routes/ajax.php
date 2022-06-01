<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware'=>'auth:teacher,web'],function(){
    Route::get('/Get_classrooms/{id}',[AjaxController::class,'Get_classrooms']);
    Route::get('/Get_Sections/{id}', [AjaxController::class,'Get_Sections'] );
});

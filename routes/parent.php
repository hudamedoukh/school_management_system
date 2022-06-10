<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| parent Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'middleware' => ['auth:parent']
    ], function () {

    //==============================dashboard============================
    Route::get('/parent/dashboard', function () {
        return view('pages.parents.dashboard');
    });

});

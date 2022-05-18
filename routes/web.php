<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::group(['middleware' => ['auth']], function () {

    //==============================dashboard============================
    Route::get('/dashboard', [HomeController::class, 'index'])
        ->name('dashboard');

    Route::resource('grades', GradeController::class);

    //==============================Classrooms============================
    Route::resource('classrooms', ClassroomController::class);

    Route::post('delete_all', [ClassroomController::class, 'delete_all'])
        ->name('delete_all');

    Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])
        ->name('Filter_Classes');

    //==============================Sections============================
    Route::resource('Sections', SectionController::class);
    Route::get('/classes/{id}', [SectionController::class, 'getclasses']);


    Route::get('test', function () {
        return view('test');
    });

    //==============================Teachers============================
    Route::resource('Teachers', TeacherController::class);


    //==============================Parents============================
    Route::view('add_parent', 'livewire.show_Form');
});

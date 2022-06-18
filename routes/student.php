<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\AccountStudentController;
use App\Http\Controllers\Students\StudentProfileController;
use App\Http\Controllers\Teachers\dashboard\MarkController;
use App\Http\Controllers\Teachers\dashboard\OnlineZoomClassesController;

/*
|--------------------------------------------------------------------------
| student Routes
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
        'middleware' => ['auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    });
    Route::get('/index_marks', [MarkController::class, 'ViewMark'])->name('marks.index');
    Route::get('/view_marks', [MarkController::class, 'getMarks'])->name('marks.view');
    Route::get('/books_show', [LibraryController::class, 'showBooks'])->name('books.show');
    Route::get('/onlineClasses_show', [OnlineZoomClassesController::class, 'studentOnlineClasses'])->name('onlineClasses.show');
    Route::get('/accounts', [AccountStudentController::class, 'index'])->name('accounts.show');
    Route::get('/teachers', [AccountStudentController::class, 'getTeachers'])->name('teachers');
    //==============================Profile=============================
    Route::get('/student/profile', [StudentProfileController::class, 'index'])->name('student_profile.show');
    Route::post('/student/profile/{id}', [StudentProfileController::class, 'update'])->name('student_profile.update');

});

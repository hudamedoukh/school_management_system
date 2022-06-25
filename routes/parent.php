<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parents\ParentController;
use App\Http\Controllers\Parents\ParentProfileController;

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
    Route::get('/students', [ParentController::class, 'index'])->name('parent.students');
    Route::get('/marks/{id}/', [ParentController::class, 'ViewMark'])->name('marks');
    Route::get('/student_marks', [ParentController::class, 'getMarks'])->name('student_marks');
    Route::get('/student_account/{id}', [ParentController::class, 'studentAccounts'])->name('student_account');
    Route::get('/student_books/{id}/', [ParentController::class, 'getBooks'])->name('student_books');
    Route::get('/student_teachers/{id}/', [ParentController::class, 'getTeachers'])->name('student_teachers');
    Route::get('/student_onlineclasses/{id}/', [ParentController::class, 'getOnlineClasses'])->name('onlineclasses');

    //==============================Profile=============================
    Route::get('/parent/profile', [ParentProfileController::class, 'index'])->name('parent_profile.show');
    Route::post('/parent/profile/{id}', [ParentProfileController::class, 'update'])->name('parent_profile.update');

});


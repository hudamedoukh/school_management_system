<?php

use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use Illuminate\Support\Facades\Route;


// Student Registration Routes  
Route::prefix('students')->group(function(){

    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])
        ->name('student.registration.view');
    
    Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])
        ->name('student.registration.add');
    
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])
        ->name('student.registration.store');

    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])
        ->name('student.year.class.wise');
    
    Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])
        ->name('student.registration.edit');
    
    Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])
        ->name('student.registration.update');
    
    Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])
        ->name('student.registration.promotion');
    
    Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])
        ->name('promotion.student.registration');
    
    Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])
        ->name('student.registration.details');
    
    
    // Registration Fee Routes 
    Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])
        ->name('registration.fee.view');
    
    Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])
        ->name('student.registration.fee.classwise.get');
    
    Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])
        ->name('student.registration.fee.payslip');
    
    
    // Monthly Fee Routes 
    Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])
        ->name('monthly.fee.view');
    
    Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])
        ->name('student.monthly.fee.classwise.get');
    
    Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])
        ->name('student.monthly.fee.payslip');
    
    // Exam Fee Routes 
    Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])
        ->name('exam.fee.view');
    
    Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])
        ->name('student.exam.fee.classwise.get');
    
    Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])
        ->name('student.exam.fee.payslip');
    
    }); 
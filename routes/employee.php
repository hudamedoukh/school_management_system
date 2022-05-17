<?php

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use Illuminate\Support\Facades\Route;


Route::prefix('employees')->group(function(){
// Employee Registration Routes
    Route::get('reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])
        ->name('employee.registration.view');    
    Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])
        ->name('employee.registration.add');    
    Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])
        ->name('employee.registration.store');
    Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])
        ->name('employee.registration.edit');    
    
});
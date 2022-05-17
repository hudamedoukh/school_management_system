<?php

use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;



// All Routes for setups

Route::prefix('setups')->group(function(){

    //student class routes
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])
        ->name('student.class.view');
    
    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])
        ->name('student.class.add');

    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])
        ->name('student.class.store');

    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])
        ->name('student.class.edit');

    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])
        ->name('student.class.update');
    
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])
        ->name('student.class.delete');


    // Student Year Routes 

    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])
        ->name('student.year.view');

    Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])
        ->name('student.year.add');

    Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])
        ->name('student.year.store');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])
        ->name('student.year.edit');

    Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])
        ->name('student.year.update');

    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])
        ->name('student.year.delete');
    

    // Fee Category Routes 

    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])
        ->name('fee.category.view');

    Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])
        ->name('fee.category.add');

    Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])
        ->name('fee.category.store');

    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])
        ->name('fee.category.edit');

    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])
        ->name('fee.category.update');

    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])
        ->name('fee.category.delete');

    // Fee Category Amount Routes 

    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])
        ->name('fee.amount.view');

    Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])
        ->name('fee.amount.add');

    Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])
        ->name('fee.amount.store');

    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])
        ->name('fee.amount.edit');

    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])
        ->name('fee.amount.update');

    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])
        ->name('fee.amount.details');
    
    // Exam Type Routes 

    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])
        ->name('exam.type.view');

    Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])
        ->name('exam.type.add');

    Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])
        ->name('exam.type.store');

    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])
        ->name('exam.type.edit');

    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])
        ->name('exam.type.update');

    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])
        ->name('exam.type.delete');
    
    
// School Subject All Routes 

    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])
        ->name('school.subject.view');

    Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])
        ->name('school.subject.add');

    Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])
        ->name('school.subject.store');

    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])
        ->name('school.subject.edit');

    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])
        ->name('school.subject.update');

    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])
        ->name('school.subject.delete');
    
    // Assign Subject Routes 

    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])
        ->name('assign.subject.view');

    Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])
        ->name('assign.subject.add');

    Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])
        ->name('assign.subject.store');

    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])
        ->name('assign.subject.edit');

    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])
        ->name('assign.subject.update');

    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])
        ->name('assign.subject.details');

 // Designation All Routes 

    Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])
        ->name('designation.view');

    Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])
        ->name('designation.add');

    Route::post('designation/store', [DesignationController::class, 'DesignationStore'])
        ->name('designation.store');

    Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])
        ->name('designation.edit');

    Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])
        ->name('designation.update');

    Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])
        ->name('designation.delete');


}); 


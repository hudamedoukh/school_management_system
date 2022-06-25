<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Teachers\dashboard\MarkController;
use App\Http\Controllers\Teachers\dashboard\ProfileController;
use App\Http\Controllers\Teachers\dashboard\QuizzesController;
use App\Http\Controllers\Teachers\dashboard\StudentController;
use App\Http\Controllers\Teachers\dashboard\QuestionController;
use App\Http\Controllers\Teachers\dashboard\OnlineZoomClassesController;
use App\Http\Controllers\Teachers\dashboard\StudentController as DashboardStudentController;

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

Route::group(
    [
        'middleware' => ['auth:teacher']
    ],
    function () {

        //==============================dashboard============================
        Route::get('/teacher/dashboard', function () {

            $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['count_sections'] = $ids->count();
            $data['count_students'] = Student::whereIn('section_id', $ids)->count();

            return view('pages.Teachers.dashboard.dashboard', $data);
        });

        Route::group(['namespace' => 'Teachers\dashboard'], function () {

            //==============================students============================
            Route::get('student/{id}', [DashboardStudentController::class, 'index'])
                ->name('student.index');
            Route::get('sections', [DashboardStudentController::class, 'sections'])
                ->name('sections');
            Route::post('attendance', [DashboardStudentController::class, 'attendance'])
                ->name('attendance');
            Route::post('edit_attendance', [DashboardStudentController::class, 'editAttendance'])
                ->name('attendance.edit');
            Route::get('attendance_report', [DashboardStudentController::class, 'attendanceReport'])
                ->name('attendance.report');
            Route::post('attendance_report', [DashboardStudentController::class, 'attendanceSearch'])
                ->name('attendance.search');
        });
        Route::resource('online_zoom_classes', OnlineZoomClassesController::class);
        Route::get('/indirect', [OnlineZoomClassesController::class, 'indirectCreate'])
            ->name('indirect.teacher.create');
        Route::post('/indirect', [OnlineZoomClassesController::class, 'storeIndirect'])
            ->name('indirect.teacher.store');

        Route::resource('quizzes', QuizzesController::class);
        Route::resource('questions', QuestionController::class);
        Route::get('grade_classrooms/{id}/', [QuizzesController::class, 'get_classes']);
        Route::get('classroom_sections/{id}/', [QuizzesController::class, 'get_sections']);

        //==============================Marks============================
        Route::get('marks/entry/add', [MarkController::class, 'AddMark'])
            ->name('marks.entry.add');

        Route::get('/marks_entry/get_students', [MarkController::class, 'getSudents'])
            ->name('marks_entry.get_students');
        Route::post('/marks_entry/store', [MarkController::class, 'store'])->name('marks_entry.store');
        Route::get('/marks_entry/edit', [MarkController::class, 'edit'])->name('marks_entry.edit');
        Route::get('/marks_entry/get_students_marks', [MarkController::class, 'getSudentsMarks'])->name('marks_entry.get_students_marks');

        Route::post('/marks_entry/update', [MarkController::class, 'update'])->name('marks_entry.update');

        Route::get('/Get_Subjects/{id}', [MarkController::class, 'Get_Subjects'])->name('Get_Subjects');
        Route::get('/mark/sections/{id}', [MarkController::class, 'Get_Sections']);

        Route::get('/Get_Quizes/{sub_id}/{section_id}', [MarkController::class, 'Get_Quizes'])->name('Get_Quizes');

        Route::get('/mark/classes/{id}', [MarkController::class, 'Get_classrooms']);
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');
        Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    }
);

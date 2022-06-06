<?php


use Livewire\Livewire;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Quizzes\QuizController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Teachers\SalaryController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Students\OnlineClassController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Teachers\MonthlySalalryController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use App\Http\Controllers\Teachers\TeacherVacationController;
use App\Http\Controllers\Teachers\TeacherAttendanceController;

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

// Auth::routes();

// Route::group(['middleware' => ['guest']], function () {
//     Route::get('/', function () {
//         return view('auth.login');
//     });
// });

Route::get('/', [HomeController::class, 'index'])->name('selection');;

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}',[LoginController::class,'loginForm'])->middleware('guest')->name('login.show');

     Route::post('/login',[LoginController::class,'login'])->name('login');

     Route::get('/logout/{type}', [LoginController::class,'logout'])->name('logout');

    });
Route::group(['middleware' => ['auth']], function () {

    //==============================dashboard============================
     Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


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
    Route::view('add_parent', 'livewire.show_Form')->name('add_parent');


    //==============================Students============================

    Route::resource('Students', StudentController::class);

    Route::post('Upload_attachment',  [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}',  [StudentController::class,'Download_attachment'])->name('Download_attachment');
    Route::post('Delete_attachment',  [StudentController::class,'Delete_attachment'])->name('Delete_attachment');
    Route::resource('online_classes', OnlineClassController::class);
    Route::get('indirect_admin', [OnlineClassController::class,'indirectCreate'])->name('indirect.create.admin');
    Route::post('indirect_admin', [OnlineClassController::class,'storeIndirect'])->name('indirect.store.admin');
    Route::resource('library',LibraryController::class);
    Route::get('download_file/{filename}', [LibraryController::class,'downloadAttachment'])->name('downloadAttachment');

    //==============================Promotion Students ============================

    Route::resource('Promotion', PromotionController::class);
    Route::resource('Graduated', GraduatedController::class);

    //==============================Fees,Fees_Invoices,Receipt Students,ProcessingFee  ============================

    Route::resource('Fees', FeesController::class);
    Route::resource('Fees_Invoices', FeesInvoicesController::class);
    Route::resource('receipt_students', ReceiptStudentsController::class);
    Route::resource('ProcessingFee', ProcessingFeeController::class);
    Route::resource('Payment_students', PaymentController::class);

    Route::resource('Attendance', AttendanceController::class);

    Route::resource('subjects', SubjectController::class);

    Route::resource('Exams', ExamController::class);
    //==============================Setting============================
    Route::resource('settings', SettingController::class);

    Route::resource('Quizzes', QuizController::class);

    Route::resource('questions', QuestionController::class);

    Route::resource('TeacherAttendance', TeacherAttendanceController::class);
    Route::resource('Vacations', TeacherVacationController::class);
    Route::resource('Salaries', SalaryController::class);
    Route::resource('MonthlySalary', MonthlySalalryController::class);
    Route::get('getTeachers',[MonthlySalalryController::class,'getTeachers'])->name('getTeachers');
    Route::get('showPdf/{teacher_id}',[MonthlySalalryController::class,'showPdf'])->name('showPdf');
    
    //==============================Calender============================

    Livewire::component('calendar', Calendar::class);
});


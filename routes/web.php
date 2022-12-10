<?php

// use Illuminate\Support\Facades\Mail;
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

// Route::get('/', function () {
   
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// TEACHER AND ADMIN ROUTES
Route::group(['middleware' => ['teacher_and_admin']], function() {
    Route::get('/add-mark', [App\Http\Controllers\MarkController::class, 'add'])->name('add-mark');
    Route::post('/addMark', [App\Http\Controllers\MarkController::class, 'validateForm']);
    Route::get('/student-list', [App\Http\Controllers\StudentController::class, 'list'])->name('student-list');
    Route::get('/student-profile/{id}', [App\Http\Controllers\StudentController::class, 'profile'])->name('student-profile');

    Route::get('/subject-list', [App\Http\Controllers\SubjectController::class, 'list'])->name('subject-list');

});

// ADMIN ONLY ROUTES
Route::group(['middleware' => ['admin']], function() {
    Route::get('/userList', [App\Http\Controllers\UserController::class, 'list']);
    Route::get('/editUser/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::get('/delUser/{id}', [App\Http\Controllers\UserController::class, 'del']);
    Route::post('/editUserController/{id}', [App\Http\Controllers\UserController::class, 'editUser']);

    Route::get('/studentAdd', [App\Http\Controllers\StudentFormController::class, 'generateForm']);
    Route::post('/addStudent', [App\Http\Controllers\StudentController::class, 'add']);
    
    Route::post('/subjectValidate', [App\Http\Controllers\SubjectController::class, 'add']);
});

Route::get('/teacher-list', [App\Http\Controllers\TeacherController::class, 'list'])->name('teacher-list');

// STUDENT ONLY ROUTES
Route::group(['middleware' => ['auth', 'student']], function() {
    Route::get('/mark-list', [App\Http\Controllers\MarkController::class, 'list'])->name('mark-list');
});
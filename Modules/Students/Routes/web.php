<?php

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

Route::group(['prefix' => 'students', 'middleware' => ['auth']], function () { 
    Route::get('/class', 'StudentsController@index')->name('Students');
    Route::get('/year', 'StudentsController@studentsYear')->name('Students Year'); 
    Route::get('/attendance', 'StudentsController@dailyAttendance')->name('Attendance'); 
    Route::get('/pupils-permission', 'StudentsController@studentsPermission')->name('Students Permission');
    Route::get('/view-students-for-this-class/{class_id}', 'StudentsController@studentsForParticularClass')->name('StudentsList');
    Route::get('/year-class/{year_id}', 'StudentsController@studentsForParticularYearClass')->name('Class Years'); 
    Route::get('/students-per-class-per-year/{class_id}', 'StudentsController@studentsPerYearPerClass')->name('Students Per Class Per Years');
    Route::get('/edit-student/{student_id}', 'StudentsController@editStudent')->name('EditStudent');
    Route::get('/view-more/{student_id}', 'StudentsController@studentsMoreInformation')->name('StudentDetails');
    Route::get('/upload-photo/{student_id}', 'StudentsController@uploadStudentsPhoto')->name('UploadStudentPhoto');
    Route::get('/edit-daily-attendance/{attendance_id}', 'StudentsController@editDailyAttendance')->name('EditDailyAttendance');
});

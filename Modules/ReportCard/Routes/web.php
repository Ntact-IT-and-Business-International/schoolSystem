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

Route::group(['prefix' => 'reportcard', 'middleware' => ['auth']], function () { 
    Route::get('/', 'ReportCardController@index');
    Route::get('/holiday-package', 'ReportCardController@holidayPackage')->name('Holiday Package');
    Route::get('/ple-results', 'ReportCardController@pleResuts')->name('Ple Results');
    Route::get('/examinations', 'ReportCardController@examinations')->name('Examination');
    Route::get('/generate-report-card', 'ReportCardController@generateReportCards')->name('Generate Report Cards');
    Route::get('/view-classes/{term}', 'ReportCardController@termlyClasses')->name('Termly Classes');
    Route::get('/view-students/{class_id}', 'ReportCardController@classStudents')->name('Class Students');
    Route::get('/print-report-card/{student_id}', 'ReportCardController@studentReportCard')->name('Report Card');
    Route::get('/print-report-card-now/{student_id}', 'ReportCardController@printStudentReportCard')->name('Print Report Card');
});

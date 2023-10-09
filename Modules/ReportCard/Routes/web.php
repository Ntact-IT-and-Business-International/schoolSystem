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
    Route::get('/generate-primary-report-card', 'ReportCardController@generateReportCards')->name('Generate Primary Report Cards');
    Route::get('/generate-nursery-report-card', 'ReportCardController@generateNurseryReportCards')->name('Generate Nursery Report Cards');
    Route::get('/view-classes/{term}', 'ReportCardController@termlyClasses')->name('Termly Classes');
    Route::get('/view-nursery-termly-classes/{term_id}', 'ReportCardController@viewNurseryTermlyClasses')->name('View Nursery Termly Classes');
    Route::get('/view-nursery-students/{class_id}/{term}', 'ReportCardController@nurseryClassStudents')->name('Class Students');
    Route::get('/view-students/{class_id}/{term}', 'ReportCardController@classStudents')->name('Class Students');
    Route::get('/print-report-card/{student_id}/{term}', 'ReportCardController@studentReportCard')->name('Report Card');
    Route::get('/print-report-card-now/{student_id}/{term}', 'ReportCardController@printStudentReportCard')->name('Print Report Card');
    Route::get('/print-midterm-results/{student_id}/{term}', 'ReportCardController@studentMidtremResults')->name('Midterm Results');
    Route::get('/print-midterm-results-now/{student_id}/{term}', 'ReportCardController@printStudentMidtermResults')->name('Midterm Results');
    Route::get('/print-nursery-midterm-results/{student_id}/{term}', 'ReportCardController@printNurseryMidtermResults')->name('Nursery Midterm Results');
    Route::get('/print-nursery-report-card/{student_id}/{term}', 'ReportCardController@printNurseryReportCard')->name('Print Nursery Report Card');
    Route::get('/marksheet/{class_id}/{term}', 'ReportCardController@generatePrimaryMarksheet')->name('Exams Primary Marksheet');
    Route::get('/print-marksheet-now/{class_id}/{term}', 'ReportCardController@printPrimaryMarksheet');
    Route::get('/miderm-marksheet/{class_id}/{term}', 'ReportCardController@generateMidtermPrimaryMarksheet')->name('Midterm Primary Marksheet');
    Route::get('/print-midterm-marksheet-now/{class_id}/{term}', 'ReportCardController@printMidermPrimaryMarksheet');
    Route::get('/nursery-midterm-marksheet/{class_id}/{term}', 'ReportCardController@nurseryMidermMarksheet')->name('Nursery Midterm Marksheet');
    Route::get('/nursery-exam-marksheet/{class_id}/{term}', 'ReportCardController@nurseryExamMarksheet')->name('Nursery Midterm Marksheet');
    Route::get('/print-nursery-midterm-marksheet-now/{class_id}/{term}', 'ReportCardController@printNurseryMidtermMarksheet');

    Route::get('/edit-result/{result_id}', 'ReportCardController@editResults')->name('EditResults'); 
    Route::get('/edit-ple-results/{ple_result_id}','ReportCardController@editPleResults')->name('EditPleResults');
    Route::get('/comment-on-report-card/{student_id}/{term}','ReportCardController@commentOnReportCard')->name('CommentOnReportCard');
    Route::get('/save', 'ReportCardController@saveComment');
    Route::get('/create-headteachers-comment/{student_id}', 'ReportCardController@commentOnPupilsResults'); 
    Route::get('/comment-on-midterm/{student_id}/{term}', 'MidtermController@commentOnMidtermResults');
    Route::get('/save-teachers-comment', 'MidtermController@createMidtermComment');
    Route::get('/save-headteachers-comment/{student_id}', 'MidtermController@commentMidtermResults'); 
});

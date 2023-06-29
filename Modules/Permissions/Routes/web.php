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

Route::group(['prefix' => 'permissions', 'middleware' => ['auth']], function () { 
    Route::get('/all-staff-permission-requests', 'PermissionsController@staffPermissionRequests')->name('Staff Permission Requests');
    Route::get('/all-students-permission-requests', 'PermissionsController@studentsPermissionRequests')->name('Students Permission Requests');
    Route::get('/reply-permission-requests/{permission_id}', 'PermissionsController@replyPermissionRequests')->name('replyPermission');
    Route::get('/forward-permission-requests/{permission_id}', 'PermissionsController@forwardPermissionRequests')->name('forwardPermission');

    //This routes are for adding users particular permission 
    Route::get('users-for-permissions','PermissionsController@allUserTypesForPermission')->name('Users Categories'); 
    Route::get('view-permissions/{category_id}','PermissionsController@userTypePermissions')->name('User Type Permissions'); 
    Route::get('select-permissions','PermissionsController@permission')->name('Permissions'); 
});

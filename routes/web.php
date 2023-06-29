<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\FrontPagesController; 
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('Home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Front pages
Route::get('/about-us',[FrontPagesController::Class,'aboutUs'])->name('About Us');
Route::get('/our-services',[FrontPagesController::Class,'services'])->name('Services');
Route::get('/our-portfolio',[FrontPagesController::Class,'portfolio'])->name('Our Portfolio');
Route::get('/ple-results',[FrontPagesController::Class,'results'])->name('Our PLE Results');
Route::get('/our-jobs',[FrontPagesController::Class,'jobs'])->name('Our Jobs');
Route::get('/our-contacts',[FrontPagesController::Class,'contact'])->name('Our Contact');
Route::get('/register',function(){ return redirect('/');});

Route::get('/send-message',[FrontPagesController::Class,'sendMessage']);

Route::group(['middleware' => ['auth']], function () { 
Route::get('/logout',[LogoutController::Class,'logoutUser']);
Route::get('/mark-as-approved/{request_id}',[AdminController::Class,'approveRequest']);
Route::get('/mark-as-rejected/{request_id}',[AdminController::Class,'rejectRequest']);
});

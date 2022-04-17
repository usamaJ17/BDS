<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebCont;
use App\Http\Controllers\DonnerContorller;
use App\Http\Controllers\DeletedDonnerController;
use App\Http\Controllers\Cases;
use Illuminate\Support\Facades\URL;
use Whoops\Run;

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

// main page 
Route::get('/',[WebCont::class,'index']);

// admin
Route::post('/login',[WebCont::class,'login'])->name('login');
//dashboard

Route::get('/logout',[WebCont::class,'logout'])->name('logout');



//Middle ware 
Route::middleware(['admin'])->group(function(){
    //dashboard
Route::get('/report',[WebCont::class,'report'])->name('admin_report');
Route::get('/dashboard',[WebCont::class,'dashboard'])->name('dashboard');
Route::get('/get-donner',[WebCont::class,'get_donner'])->name('get_donner');
// CASE
Route::get('/case',[Cases::class,'index'])->name('case_form');
Route::post('/case',[Cases::class,'submit_case'])->name('submit_case');
Route::get('case-all',[Cases::class,'all_cases'])->name('all-case');
//trash
Route::get('/trash',[DeletedDonnerController::class,'trash'])->name('trash');
//restore
Route::get('/restore/{id}',[DeletedDonnerController::class,'restore_donner'])->name('restore');
// Delete
Route::get('/delete/{id}',[DeletedDonnerController::class,'delete_donner'])->name('delete');

// resource
// donner reg

});

Route::resource('/donner',DonnerContorller::class);
// Route::get('/pdf',function(){
//     $pdf = PDF::loadHTML('<h1>Test</h1>');
//     return $pdf->download('invoice.pdf');
// });


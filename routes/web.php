<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::get('', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin/','middleware' =>['role:Administrator']],function(){
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDash');

    Route::get('/manageAccount', [App\Http\Controllers\AdminController::class, 'manageAccount'])->name('manageAccount');
    Route::get('/manageAccount/create', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
    Route::post('/manageAccount/create/save', [App\Http\Controllers\AdminController::class, 'createSave'])->name('createSave');
    //Route::get('/manageAccount/edit/{id}', [App\Http\Controllers\AdminController::class, 'getUserById'])->name('view');
    Route::patch('/manageAccount/update/{id}', [App\Http\Controllers\AdminController::class, 'update']);
    Route::delete('/manageAccount/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);


});
Route::group(['prefix'=>'processor/','middleware' =>['role:Processor']],function(){
    Route::get('dashboard', [App\Http\Controllers\ProcessorController::class, 'index'])->name('processorDash');    
    Route::get('/profile', [App\Http\Controllers\ProcessorController::class, 'profile'])->name('pProfile');  
});
Route::group(['prefix'=>'validator/','middleware' =>['role:Validator']],function(){
    Route::get('dashboard', [App\Http\Controllers\ValidatorController::class, 'index'])->name('validatorDash');    
    Route::get('/profile', [App\Http\Controllers\ValidatorController::class, 'profile'])->name('vProfile');  
});
Route::group(['prefix'=>'approver/','middleware' =>['role:Approver']],function(){
    Route::get('dashboard', [App\Http\Controllers\ApproverController::class, 'index'])->name('approverDash');
    Route::get('/profile', [App\Http\Controllers\ApproverController::class, 'profile'])->name('aProfile');      
});
Route::group(['prefix'=>'requestor/','middleware' =>['role:Requestor']],function(){
    Route::get('dashboard', [App\Http\Controllers\RequestorController::class, 'index'])->name('requestorDash');
    Route::get('/profile', [App\Http\Controllers\RequestorController::class, 'profile'])->name('rProfile');    
});





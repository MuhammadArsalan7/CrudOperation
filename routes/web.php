<?php

use App\Http\Controllers\AjaxCont;
use App\Http\Controllers\CustomerCont;
use App\Http\Controllers\Email;
use App\Http\Controllers\UserCont;
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

Route::get('/', function () {
    return view('Email');
});
Route::get('CreateU',[UserCont::class,'Createuser']);
Route::post('created',[UserCont::class,'Store'] );
Route::get('indexx',[UserCont::class,'Index'] );
Route::get('EditUser/{id}', [UserCont::class,'edit']);
Route::post('update/{data}', [UserCont::class,'update']);
Route::delete('delete/{id}',[UserCont::class,'Delete']);


Route::get('CreateCustomer',[CustomerCont::class,'CreateCus']);
Route::post('inserted',[CustomerCont::class,'Store']);
Route::get('Index',[CustomerCont::class,'GetData']);
Route::get('edit/{id}',[CustomerCont::class,'Edit']);
Route::post('update/{data}',[CustomerCont::class,'Update']);
Route::delete('delete/{id}',[CustomerCont::class,'Delete']);


Route::get('tab',[AjaxCont::class,'getdata']);
Route::post('Addcustomer',[AjaxCont::class,'addCustomer'])->name('customers.add');
Route::put('updateData/{id}',[AjaxCont::class,'Updated']);
Route::delete('del/{id}',[AjaxCont::class,'DeleteRec']);


Route::post('send',[Email::class,'getmail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

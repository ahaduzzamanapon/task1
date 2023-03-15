<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;

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

// auth
Route::get('/logout', [authcontroller::class, 'logout']);
Route::get('/adminlogin', [authcontroller::class, 'adminlogin']);
Route::post('/loginadmin', [authcontroller::class, 'loginadmin'])->name('loginadmin');


// admin

Route::get('/admin', [admincontroller::class, 'dashbord'])->middleware('adminlogin');
Route::get('/admin/manageimage', [admincontroller::class, 'manageimage'])->middleware('adminlogin');
Route::get('/admin/addimage', [admincontroller::class, 'addimage'])->middleware('adminlogin');
Route::get('/admin/settings', [admincontroller::class, 'settings'])->middleware('adminlogin');
Route::post('/admin/updatesettings', [admincontroller::class, 'updatesettings'])->middleware('adminlogin');
Route::get('/admin/cattbl', [admincontroller::class, 'cattbl'])->middleware('adminlogin');
Route::get('/admin/addcat', [admincontroller::class, 'addcat'])->middleware('adminlogin');
Route::post('/admin/catstor', [admincontroller::class, 'catstor'])->middleware('adminlogin');
Route::post('/admin/imagestor', [admincontroller::class, 'imagestor'])->middleware('adminlogin');
Route::get('/admin/editcat/{id}', [admincontroller::class, 'editcat'])->middleware('adminlogin');
Route::post('/admin/updatedata/{id}', [admincontroller::class, 'updatedata'])->middleware('adminlogin');
Route::get('/admin/delletdata/{id}', [admincontroller::class, 'delletdata'])->middleware('adminlogin');
Route::get('/admin/delletimage/{id}', [admincontroller::class, 'delletimage'])->middleware('adminlogin');

// usercontroller
Route::get('/', [usercontroller::class, 'user']);

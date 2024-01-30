<?php

use App\Http\Controllers\Features\UserManagement;
use App\Http\Controllers\Features\UserManagementController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customersaccounts', [UserManagementController::class, 'customers']);
Route::get('/employeesaccounts', [UserManagementController::class, 'index']);
Route::get('/addemployee', [UserManagementController::class, 'addEmployee']);

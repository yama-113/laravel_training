<?php

use App\Http\Controllers\CompaniesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// 一覧表示
Route::get('companies',[CompaniesController::class, 'index'])->name('companies');

// 新規作成
Route::get('companies/create',[CompaniesController::class, 'create'])->name('companies.create');
Route::post('companies/store',[CompaniesController::class, 'store'])->name('companies.store');

// 編集
Route::get('companies/edit/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::post('companies/update/{id}', [CompaniesController::class, 'update'])->name('companies.update');

// 削除
// Route::get('companies',[CompaniesController::class, 'delete'])->name('companies');

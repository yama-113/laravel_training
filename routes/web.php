<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\QuotationsController;
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

// 会社情報一覧表示
Route::get('companies',[CompaniesController::class, 'index'])->name('companies');

// 会社情報新規作成
Route::get('companies/create',[CompaniesController::class, 'create'])->name('companies.create');
Route::post('companies/store',[CompaniesController::class, 'store'])->name('companies.store');

// 会社情報編集
Route::get('companies/edit/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::post('companies/update/{id}', [CompaniesController::class, 'update'])->name('companies.update');

// 会社情報削除
Route::get('companies/destory/{id}', [CompaniesController::class,'destory'])->name('companies.destory');

// 見積情報一覧
Route::get('quotations/{id}',[QuotationsController::class,'index'])->name('quotations');

// 見積新規作成
Route::get('quotations/create/{id}',[QuotationsController::class,'create'])->name('quotations.create');
Route::post('quotations/store/{id}',[QuotationsController::class,'store'])->name('quotations.store');

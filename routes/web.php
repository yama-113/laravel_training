<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\QuotationsController;
use App\Http\Controllers\InvoicesController;
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

// 会社情報編集更新
Route::get('companies/edit/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::post('companies/update/{id}', [CompaniesController::class, 'update'])->name('companies.update');

// 会社情報削除
Route::get('companies/destroy/{id}', [CompaniesController::class,'destroy'])->name('companies.destroy');

// 見積情報一覧
Route::get('quotations/{id}',[QuotationsController::class,'index'])->name('quotations');

// 見積新規作成
Route::get('quotations/create/{id}',[QuotationsController::class,'create'])->name('quotations.create');
Route::post('quotations/store/{id}',[QuotationsController::class,'store'])->name('quotations.store');

// 見積情報編集更新
Route::get('quotations/edit/{id}/{qid}', [QuotationsController::class,'edit'])->name('quotations.edit');
Route::post('quotations/update/{id}/{qid}', [QuotationsController::class,'update'])->name('quotations.update');

// 見積削除
Route::get('quotations/destroy/{id}/{qid}',[QuotationsController::class,'destroy'])->name('quotations.destroy');

//請求情報一覧
Route::get('invoices/{id}',[InvoicesController::class,'index'])->name('invoices');

// 請求新規作成
Route::get('invoices/create/{id}',[InvoicesController::class,'create'])->name('invoices.create');
Route::post('invoices/store/{id}',[InvoicesController::class,'store'])->name('invoices.store');

// 請求情報編集更新
Route::get('invoices/edit/{id}/{iid}',[InvoicesController::class,'edit'])->name('invoices.edit');
Route::post('invoices/update/{id}/{iid}',[InvoicesController::class,'update'])->name('invoices.update');

// 請求削除
Route::get('invoices/destroy/{id}/{iid}',[InvoicesController::class,'destroy']) ->name('invoices.destroy');

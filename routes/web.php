<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxEmployeeController;
use App\Http\Controllers\ReadXmlController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\MyController;


Route::get('currency', [CurrencyController::class, 'index'])->name('currency');
Route::post('currency', [CurrencyController::class, 'exchangeCurrency']);


Route::get('lang/home', [LangController::class, 'index'])->name('lang_home');
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


Route::get('importExportView', [MyController::class, 'importExportView'])->name('importExportView');
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');

Route::match(["get", "post"], "read-xml", [ReadXmlController::class, "index"])->name('xml-upload');

Route::get('my-form', [AjaxEmployeeController::class, 'myform']);
Route::post('my-form', [AjaxEmployeeController::class, 'myformPost'])->name('my.form');


// Route::get('ajax-form', [AjaxEmployeeController::class, 'index']);
// Route::post('store-data', [AjaxEmployeeController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\trnin2shoplists;

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

Route::get('/', function(){
    // (new trnin2shoplists())->importTodb();
    // dd('done');
    return view('auth.login');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stockcount', [App\Http\Controllers\StockCountController::class, 'index'])->name('stockcount');
Route::get('/import', [App\Http\Controllers\ImportController::class, 'index'])->name('import');
Route::post('/pos-data', [App\Http\Controllers\ImportController::class, 'clear'])->name('postData');
Route::post('/import-data', [App\Http\Controllers\ImportController::class, 'csv_import'])->name('importData');
Route::post('/export-data', [App\Http\Controllers\ImportController::class, 'export'])->name('exportData');

 


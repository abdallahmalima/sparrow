<?php

use App\Http\Controllers\Auth\MyLoginController;
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

Route::get('/',App\Http\Controllers\FontPageController::class);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login',[MyLoginController::class,'index'])->name('login');
Route::post('/login',[MyLoginController::class,'authenticate'])->name('login.store');
Route::group(['middleware'=>'auth'],function(){
    Route::get('services/search',App\Http\Controllers\ServiceSearchController::class)->name('services.search');
    Route::get('galleries/search',App\Http\Controllers\GallerySearchController::class)->name('galleries.search');
    Route::get('service_export_pdf',[App\Http\Controllers\PDFController::class,'export'])->name('service_export_pdf');
    Route::get('service_export_excel',[App\Http\Controllers\ExcelController::class,'export'])->name('service_export_excel');
    Route::get('service_export_csv',[App\Http\Controllers\ExcelController::class,'exportCSV'])->name('service_export_csv');
    Route::post('service_import_excel',[App\Http\Controllers\ExcelController::class,'import'])->name('service_import_excel');
    Route::get('services/excels/create',[App\Http\Controllers\ExcelController::class,'importForm'])->name('services.excels.create');
    Route::resource('galleries',App\Http\Controllers\GalleryController::class);
    Route::resource('services',App\Http\Controllers\ServiceController::class);
    Route::get('users/search',App\Http\Controllers\UserSearchController::class)->name('users.search');
    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::get('logos/edit',[App\Http\Controllers\LogoController::class,'edit'])->name('logos.edit');
    Route::put('logos',[App\Http\Controllers\LogoController::class,'update'])->name('logos.update');
    Route::get('headers/edit',[App\Http\Controllers\HeaderController::class,'edit'])->name('headers.edit');
    Route::put('headers',[App\Http\Controllers\HeaderController::class,'update'])->name('headers.update');
    Route::get('fsections/edit',[App\Http\Controllers\FsectionController::class,'edit'])->name('fsections.edit');
    Route::put('fsections',[App\Http\Controllers\FsectionController::class,'update'])->name('fsections.update');
    Route::get('footers/edit',[App\Http\Controllers\FooterController::class,'edit'])->name('footers.edit');
    Route::put('footers',[App\Http\Controllers\FooterController::class,'update'])->name('footers.update');
    Route::get('ssections/edit',[App\Http\Controllers\SsectionController::class,'edit'])->name('ssections.edit');
    Route::put('ssections',[App\Http\Controllers\SsectionController::class,'update'])->name('ssections.update');
    Route::post('/logout',[MyLoginController::class,'logout'])->name('logout');

    Route::resource('clients',App\Http\Controllers\ClientController::class);
});

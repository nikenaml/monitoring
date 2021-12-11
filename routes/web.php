<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FalseAlarmController;
// use App\Http\Controllers\PDFController;

require __DIR__.'/auth.php';
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

Route::get('/',[DashboardController::class, 'index'])->name('index');
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::resource('schedules',ScheduleController::class);

Route::resource('falsealarms',FalseAlarmController::class);
// Route::get('/falsealarm/cetak_pdf', FalseAlarmController::class,'cetak_pdf');
// Route::get('falsealarms/cetak_pdf', [FalseAlarmController::class, 'cetak_pdf'])->name('falsealarms.cetak_pdf');

// Route::get('/falsealarms/cetak_pdf', ['uses' => 'FalseAlarmController@cetak_pdf', 'as' => 'falsealarm.cetak_pdf']);

// Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
// Route::get('create-pdf-file', [PDFController::class, 'index'])

Route::get('/falsealarm/pdf', [FalseAlarmController::class, 'createPDF']);
Route::get('/falsealarm/pdfdate', [FalseAlarmController::class, 'createPDFdate']);
Route::get('/falsealarm', [FalseAlarmController::class, 'searchBydate']);

// Route::get('/falsealarm', [FalseAlarmController::class, 'exportBydate']);
// Route::post('/falsealarm/PDF_report', [FalseAlarmController::class, 'exportBydate']);


Route::get('/schedule/pdf', [ScheduleController::class, 'createPDF']);
Route::get('/schedule/search',[ScheduleController::class, 'search']);
// Route::get('/search', [ScheduleController::class, 'search']);



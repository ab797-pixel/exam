<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalyController;
use App\Http\Controllers\TimeTableController;

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

Route::get('/', function () {
    return view('home');
});

//export galy record from the database
Route::get('export-galy', [\App\Http\Controllers\GalyController::class,'exportGaly'])->name('export-galy');
//import galy record from the database;
Route::post('import-galy', [\App\Http\Controllers\GalyController::class,'importGaly'])->name('import-galy');
//retrieve galy data from database
Route::get('galy', [\App\Http\Controllers\GalyController::class,'index'])->name('index');

//export time table record from the database
Route::get('export_time_table', [\App\Http\Controllers\TimeTableController::class,'exportTimeTable'])->name('export_time_table');
Route::post('import_time_table', [\App\Http\Controllers\TimeTableController::class,'importTimeTable'])->name('import_time_table');
Route::get('time_table', [\App\Http\Controllers\TimeTableController::class,'index'])->name('time_table');

Route::post('create_hall/', [\App\Http\Controllers\TimeTableController::class,'createHall'])->name('create_hall');
Route::get('create_hall/dateGet', [\App\Http\Controllers\TimeTableController::class,'showDate'])->name('create_hall/dateGet');

Route::get('hall/index', [\App\Http\Controllers\GalyTimeTableController::class,'index'])->name('hall');

//print DIff types of halls
Route::get('short_hall/{date}/{session}', [\App\Http\Controllers\GalyTimeTableController::class,'shortHall'])->name('short_hall');
Route::get('entrance_hall/{date}/{session}', [\App\Http\Controllers\GalyTimeTableController::class,'entranceHall'])->name('entrance_hall');
Route::get('attandance/{date}/{session}', [\App\Http\Controllers\GalyTimeTableController::class,'attandanceHall'])->name('attandance');
Route::get('present/{date}/{session}', [\App\Http\Controllers\GalyTimeTableController::class,'studentPresent'])->name('attandance');

//Route::view('ehall','ehall/create');

//Route::view('time_table','time_table/create');



//Route::view('entrance_hall/{date}','hall/entrance_hall');
Route::view('hall','hall/create');






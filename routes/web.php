<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Upload\UploadController;
use App\Http\Controllers\ListController;

Route::get('/uploadcsv', [UploadController::class,'index'])-> name('uploadcsv');
Route::post('/uploadcsv', [UploadController::class,'store']);
//Route::get('/', [ListController::class, 'getData']);

Route::get('/', [ListController::class, 'index'])->name('home');
Route::post('/', [ListController::class, 'update'])->name('update');

//Route::get('/', function () {
  // return view('lists.index');
//})->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Upload\UploadController;

Route::get('/uploadcsv', [UploadController::class,'index'])-> name('uploadcsv');
Route::post('/uploadcsv', [UploadController::class,'store']);

Route::get('/', function () {
   return view('lists.index');
});

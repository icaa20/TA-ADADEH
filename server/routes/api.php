<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//buat route karyawan
//route tampil data
Route::get('/view',[karyawan::class,'view']);
//route untuk detail data
Route::get('/detail/{parameter}',[karyawan::class,'detail']);
// route untuk delete data
Route::delete('/delete/{parameter}',[karyawan::class,'delete']);

Route::post('/insert',[karyawan::class,'insert']);

Route::put('/update/{parameter}',[karyawan::class,'update']);




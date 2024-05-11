<?php

use App\Http\Controllers\CommuneController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\WilayaController;
// use App\Models\Laboratory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',  [WilayaController::class, 'index']   )->name('dashboard');
});



Route::post('/get_all_communes/{id_wilaya}', [CommuneController::class, 'get_all_communes'])->name('ajax.get_all_communes');

Route::get( "/all_labs" ,    [LaboratoryController::class, 'index']   )  -> middleware('auth')  ;
Route::get( "/lab_info/{id}" ,    [LaboratoryController::class, 'get_info_lab']   )  -> middleware('auth' , 'CheckIdLab' )  ;

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// API Resources
Route::apiResource('banos', 'BanosApiController');


// API Searches
Route::get('banosfiltrados', 'BanosApiController@search');

Route::middleware('auth:api','trabajadorapi')->get('/servicio', function (Request $request) { return ['mensaje' => 'Hola Trabajador'];});

Route::get('/solotrabajadores', function() {return ["mensaje" => "Esta ruta no existe metiche"];})->name('api.solotrabajadores');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\PostController;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Http\Controllers\ChauffeurController;
use App\Http\Resources\ChauffeurResource;
use App\Models\Chauffeur;
use App\Http\Controllers\VahiculeController;
use App\Http\Resources\VehiculeResource;
use App\Models\Vahicule;
use App\Http\Controllers\VoyageController;
use App\Http\Resources\VoyageResource;
use App\Models\Voyage;
use App\Models\Incident;
use App\Http\Controllers\IncidentController;
use App\Http\Resources\IncidentResource;

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

Route::get('/coins', 'App\Http\Controllers\CoinController@index');
Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::get('/Admins', 'App\Http\Controllers\AdminController@index');
Route::post('/admin','App\Http\Controllers\AdminController@store');
Route::controller(AdminController::class)->group(function () {
    Route::get('/admins', function () {return AdminResource::collection(Admin::all());});
    Route::post('/admin','App\Http\Controllers\AdminController@store');
    Route::put('/admin/{id}','update');
    Route::delete('/admin/{id}','destroy');
});

Route::controller(ChauffeurController::class)->group(function () {
    Route::get('/chauffeurs', function () {return ChauffeurResource::collection(Chauffeur::all());});
    Route::post('/chauffeur','store');
    Route::put('/chauffeur/{id}','update');
    Route::delete('/chauffeur/{id}','destroy');
});


Route::controller(VahiculeController::class)->group(function () {
    Route::get('/vehicules', function () {return VehiculeResource::collection(Vahicule::all());});
    Route::post('/vehicule','store');
    Route::put('/vehicule/{id}','update');
    Route::delete('/vehicule/{id}','destroy');
});


Route::controller(VoyageController::class)->group(function () {
    Route::get('/voyages', function () {return VoyageResource::collection(Voyage::all());});
    Route::post('/voyage','store');
    Route::put('/voyage/{id}','update');
    Route::delete('/voyage/{id}','destroy');
});


Route::controller(IncidentController::class)->group(function () {
    Route::get('/incidents', function () {return IncidentResource::collection(Incident::all());});
    Route::post('/incident','store');
    Route::put('/incident/{id}','update');
    Route::delete('/incident/{id}','destroy');
});

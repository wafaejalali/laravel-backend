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


Route::controller(AdminController::class)->group(function () {
    Route::post('/adminLogin','login');
    Route::post('/resetPassword','resetpassword');
    Route::get('reset-password/{token}',  'showResetPasswordForm')->name('reset.password.get');
    Route::post('submit-reset-password', 'submitResetPasswordForm')->name('reset.password.post');
    Route::get('/admins', function () {return AdminResource::collection(Admin::all());});
    Route::get('/admin/{id}',function($id){return new AdminResource(Admin::findOrFail($id));});
    Route::post('/admin','store');
    Route::put('/admin/{id}','update');
    Route::delete('/admin/{id}','destroy');
});

Route::controller(ChauffeurController::class)->group(function () {
    Route::post('/chauffeurLogin','login');
    Route::get('/chauffeurVoyage/{id}','show');
    Route::get('/chauffeurs', function () {return ChauffeurResource::collection(Chauffeur::all());});
    Route::get('/chauffeur/{id}',function($id){return new ChauffeurResource(Chauffeur::findOrFail($id));});
    Route::post('/chauffeur','store');
    Route::put('/chauffeur/{id}','update');
    Route::delete('/chauffeur/{id}','destroy');
});


Route::controller(VahiculeController::class)->group(function () {
    Route::get('/vehicules', function () {return VehiculeResource::collection(Vahicule::all());});
    Route::get('/vehicule/{id}',function($id){return new VehiculeResource(Vahicule::findOrFail($id));});
    Route::post('/vehicule','store');
    Route::put('/vehicule/{id}','update');
    Route::delete('/vehicule/{id}','destroy');
});


Route::controller(VoyageController::class)->group(function () {
    Route::get('/voyages', function () {return VoyageResource::collection(Voyage::all());});
    Route::get('/voyage/{id}',function($id){return new VoyageResource(Voyage::findOrFail($id));});
    Route::post('/voyage','store');
    Route::put('/voyage/{id}','update');
    Route::delete('/voyage/{id}','destroy');
});


Route::controller(IncidentController::class)->group(function () {
    Route::get('/incidents', function () {return IncidentResource::collection(Incident::all());});
    Route::get('/incident/{id}',function($id){return new IncidentResource(Incident::findOrFail($id));});
    Route::post('/incident','store');
    Route::put('/incident/{id}','update');
    Route::delete('/incident/{id}','destroy');
});

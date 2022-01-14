<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\MatriceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;





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
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    //
    Route::group(['middleware' => ['is_admin']], function() {
        Route::resource('/users',userController::class);
    });
    /////////////////////////////////////////////////////////////////////////////////
    Route::get('/menus', [MenuController::class,'index']);
    Route::get('/menus/create', [MenuController::class,'create']);
    Route::post('/menus', [MenuController::class,'store']);
    Route::get('/menus/{id}/edit', [MenuController::class,'edit'])->middleware('is_responsable');
    Route::PATCH('/menus/{id}', [MenuController::class,'update'])->middleware('is_responsable');
    Route::DELETE('/menus/{id}', [MenuController::class,'destroy'])->middleware('is_responsable');
    //////////////////////////////////////////////////////////////////////////////
    Route::get('/matrices', [MatriceController::class,'index']);
    Route::get('/matrices/create', [MatriceController::class,'create']);
    Route::post('/matrices', [MatriceController::class,'store']);
    Route::get('/matrices/{id}/edit', [MatriceController::class,'edit'])->middleware('is_responsable');
    Route::PATCH('/matrices/{id}', [MatriceController::class,'update'])->middleware('is_responsable');
    Route::DELETE('/matrices/{id}', [MatriceController::class,'destroy'])->middleware('is_responsable');
    /////////////////////////////////////////////////////////////////////////////
    Route::DELETE('/commandes/{id}', [CommandeController::class,'destroy'])->middleware('is_admin');
    Route::resource('/commandes',CommandeController::class);
                        //////////////////////////////////////////
    Route::get('/commandes/commantaire/{commande_id}',[CommandeController::class,'getCommantaire']);
    Route::post('/commandes/reject',[CommandeController::class,'reject'])->middleware('is_responsable');
    Route::get('/commandes/search/{state}',[CommandeController::class,'getCommandesWhereState']);
    Route::get('/commandes/{id}/valider',[CommandeController::class,'valider'])->middleware('is_responsable');
    Route::get('/commandes/{matrice_is}/menuOfMatrice',[CommandeController::class,'menuOfMatrice']);
    ////////////////////////////////////////////////////////////////////////////////
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::DELETE('/commercials/{id}', [CommercialController::class,'destroy'])->middleware('is_responsable');;
    Route::resource('/commercials',CommercialController::class);
    Route::resource('/clients',ClientController::class);
    ///////////////////////////////////////////////////////////////////////////////


    Route::get('/', function () {
        return view('layouts.master');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

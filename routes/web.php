<?php

use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
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
Auth::routes(['verify'=> true]);
Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


Route::group(['prefix'=>'offers'],function(){
    Route::get('create',[OfferController::class,"create"]);
    Route::post('store',[OfferController::class,"store"])->name('offers.store');
    Route::get('all',[OfferController::class,"getAllOffers"]);
    Route::get('edit/{offer_id}',[OfferController::class,"edit"])->name('offers.edit');
    Route::post('update/{offer_id}',[OfferController::class,"update"])->name('offers.update');
});

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxOfferController;
use App\Http\Controllers\Auth\CheckAgeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\VideoControoler;
use GuzzleHttp\Middleware;
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
    Route::get('all',[OfferController::class,"getAllOffers"])->name('offers.all');
    Route::get('edit/{offer_id}',[OfferController::class,"edit"])->name('offers.edit');
    Route::post('update/{offer_id}',[OfferController::class,"update"])->name('offers.update');
    Route::get('delete/{offer_id}',[OfferController::class,"delete"])->name('offers.delete');

});
 Route::get('VideoOffer',[VideoControoler::class,"Video"])->name('VideoOffer');

Route::group(['prefix'=>'Ajax-offer'],function(){
   Route::get('create',[AjaxOfferController::class,"create"])->name('Ajax.create');
   Route::post('store',[AjaxOfferController::class,"store"])->name('Ajax.store');
   Route::get('all',[AjaxOfferController::class,"show"])->name('Ajax.all');
   Route::post('delete',[AjaxOfferController::class,"delete"])->name('Ajax.delete');
   Route::get('edit/{offer_id}',[AjaxOfferController::class,"edit"])->name('Ajax.edit');
   Route::post('update',[AjaxOfferController::class,"update"])->name('Ajax.update');
});

#####################################MideleWare###################################
Route::get('notAllowed',function(){
   return "Not Adult";
})->name('NotAllowed');
Route::group(['namespace'=>'Auth','middleware'=>'CheckAge'],function(){
    Route::get('adult',[CheckAgeController::class,'adult'])->name('adult');


});
Route::get('site',[AdminController::class,"site"])->middleware('auth:web')->name('site');
Route::get('admin',[AdminController::class,'admin'])->middleware('auth:admin')->name('admin');
Route::get('admin/login',[AdminController::class,'adminlogin'])->name('admin.login');
Route::post('checkAdmin',[AdminController::class,'CheckAdminlogin'])->name('save.admin.login');

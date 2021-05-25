<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| *Custom addition* Written below is for guest
|
*/

Route::group(['guest'], function(){
	Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('welcome');
	
	Route::get('/destinations', [App\Http\Controllers\GuestController::class, 'destination'])->name('destinations');
	
	Route::get('/packages', [App\Http\Controllers\GuestController::class, 'package'])->name('packages');
	
	Route::get('/news', [App\Http\Controllers\GuestController::class, 'news'])->name('news');
	
	Route::get('/contact', [App\Http\Controllers\GuestController::class, 'contact'])->name('contact');
	
	Route::get('/destinations/detail', [App\Http\Controllers\GuestController::class, 'destinationDetail'])->name('destination-detail');
	
	Route::get('/packages/detail', [App\Http\Controllers\GuestController::class, 'packageDetail'])->name('package-detail');
	
	Route::get('/news/detail', [App\Http\Controllers\GuestController::class, 'newsDetail'])->name('news-detail');
});

Auth::routes();

Route::group(['prefix' => 'admin'],  function () {
	Route::get('/', function(){ return view('welcome'); });
	Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::group(['middleware' => 'auth'], function(){
		Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
		Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
		Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
		Route::get('map', function () {return view('pages.maps');})->name('map');
		Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
		Route::get('table-list', function () {return view('pages.tables');})->name('table');
		Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
		Route::resource('news', 'App\Http\Controllers\NewsController', ['except' => ['show']]);
		Route::post('news-attachment-upload', [App\Http\Controllers\NewsController::class, 'attach'])->name('news.attachment.store');
	
		Route::resource('packages', 'App\Http\Controllers\PackageController', ['except' => ['show']]);
	
		Route::get('/destinationmanagement', 'App\Http\Controllers\DestinationController@index')->name('destinationmanagement');
		Route::post('destinationForms', [App\Http\Controllers\DestinationController::class, 'store'])->name('destinationForms');
		Route::get('/adddestination',[App\Http\Controllers\DestinationController::class,'show']);
		Route::get('deletedestination/{slug}', [App\Http\Controllers\DestinationController::class,'destroy']);
		Route::get('editdestination/{slug}', [App\Http\Controllers\DestinationController::class, 'showEdit']);
		Route::post('/destinationFormsEdit', [App\Http\Controllers\DestinationController::class, 'update'])->name('destinationFormsEdit');
	});
});

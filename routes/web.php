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
|
*/

// Guest
Route::group(['guest'], function() {
	
	Route::get('/', function () {
		return view('guest.index');
	})->name('welcome');

	Route::get('/destinations', function () {
		return view('guest.layouts.destination');
	})->name('destinations');

	Route::get('/packages', function () {
		return view('guest.layouts.package');
	})->name('packages');

	Route::get('/news', function () {
		return view('guest.layouts.news');
	})->name('news');

	Route::get('/contact', function () {
		return view('guest.layouts.contact');
	})->name('contact');
	
	Route::get('/destinations/detail', function () {
		return view('guest.layouts.destination-detail');
	})->name('destination-detail');

	Route::get('/packages/detail', function () {
		return view('guest.layouts.package-detail');
	})->name('destination-detail');

	Route::get('/news/detail', function () {
		return view('guest.layouts.news-detail');
	})->name('destination-detail');

});

Route::get('admin', function(){ return view('welcome'); });
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::resource('news', 'App\Http\Controllers\NewsController', ['except' => ['show']]);
	
	Route::resource('packages', 'App\Http\Controllers\PackageController', ['except' => ['show']]);

	Route::get('/destinationmanagement', 'App\Http\Controllers\DestinationController@index')->name('destinationmanagement');
	Route::post('destinationForms', [App\Http\Controllers\DestinationController::class, 'store'])->name('destinationForms');
	Route::get('/adddestination',[App\Http\Controllers\DestinationController::class,'show']);
	Route::get('deletedestination/{slug}', [App\Http\Controllers\DestinationController::class,'destroy']);
	Route::get('editdestination/{slug}', [App\Http\Controllers\DestinationController::class, 'showEdit']);
	Route::post('/destinationFormsEdit', [App\Http\Controllers\DestinationController::class, 'update'])->name('destinationFormsEdit');
});


<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZoomController;
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
Route::get('', 'HomeController@index');

Route::get('meetings', 'ZoomController@index')->name('meetings.index');
Route::get('start-meeting/{meeting}', 'ZoomController@start_meeting')->name('meeting.start');
Route::get('join-meeting/{meeting}', 'ZoomController@join_meeting')->name('meeting.join');
Route::get('leave-meeting', 'ZoomController@leave_meeting')->name('meeting.leave');
Route::get('create-new-meeting', 'ZoomController@create')->name('meeting.create');
Route::post('create-new-meeting', 'ZoomController@store')->name('meeting.store');
Route::delete('delete-meeting/{meeting}', 'ZoomController@destroy')->name('meeting.destroy');
Auth::routes();
Route::get('/aa',function(){return 'wwww';});
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('home', HomeController::class);
// Route::resources('home',)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::resource('home', 'HomeController'); 
Route::resource('zoom', 'ZoomController'); 
Route::get('', 'HomeController@index');

Route::get('/',function (){return view('auth.login');});
Route::get('meetings', 'ZoomController@index')->name('meetings.index');
Route::get('start-meeting/{meeting}', 'ZoomController@start_meeting')->name('meeting.start');
Route::get('join-meeting/{meeting}', 'ZoomController@join_meeting')->name('meeting.join');
Route::get('leave-meeting', 'ZoomController@leave_meeting')->name('meeting.leave');
Route::get('create-new-meeting', 'ZoomController@create')->name('meeting.create');
Route::post('create-new-meeting', 'ZoomController@store')->name('meeting.store');
Route::delete('delete-meeting/{meeting}', 'ZoomController@destroy')->name('meeting.destroy');

Route::post('/login','LoginController@login')->name('login');
Route::post('/register','RegisterController@register')->name('register');
Route::get('zoom','ZoomController@index')->name('zoom.index');
Route::get('dasboard','HomeController@home')->name('dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('home', HomeController::class);
Route::resource('meetings', ZoomController::class);
Route::resource('zoom', ZoomController::class);
// Route::resources('home',)

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/meetings', [App\Http\Controllers\ZoomController::class, 'show'])->name('meetings');

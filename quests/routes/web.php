<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\Admin\EventController;

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

Route::get('/', function () {
    return redirect()->route('quests.index');
});

Route::resource('quests', QuestController::class);

Route::group(['middleware' => 'auth', 'middleware' => 'access:admin'], function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\EventController@index');
});

Auth::routes();

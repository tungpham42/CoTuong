<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/createRoom', [
    "uses" => 'RoomController@create',
    "as" => 'create'
]);
Route::get('/getPass/{code}', [
    "uses" => 'RoomController@getPass',
    "as" => 'getPass'
]);
Route::post('/changePass', [
    "uses" => 'RoomController@changePass',
    "as" => 'changePass'
]);
Route::post('/doiPass', [
    "uses" => 'RoomController@doiPass',
    "as" => 'doiPass'
]);
Route::post('/updateFEN', [
    "uses" => 'RoomController@store',
    "as" => 'store'
]);
Route::get('/readFEN/{code}', [
    "uses" => 'RoomController@show',
    "as" => 'show'
]);
Route::post('/processMail', [
    "uses" => 'MailController@send',
    "as" => 'send'
]);
Route::post('/xulyMail', [
    "uses" => 'MailController@gui',
    "as" => 'gui'
]);
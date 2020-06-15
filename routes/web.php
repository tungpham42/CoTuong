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

Route::get('/', function () {
    return view('human', ['headTitle' => 'Chơi với nhau', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/en']);
});
Route::get('/en', function () {
    return view('en/human', ['headTitle' => 'Play with friend', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/']);
});
Route::get('/choi-voi-may', function () {
    return view('ai', ['headTitle' => 'Chơi với máy', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai']);
});
Route::get('/play-with-ai', function () {
    return view('en/ai', ['headTitle' => 'Play with AI', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may']);
});
Route::get('/gioi-thieu', function () {
    return view('about', ['headTitle' => 'Giới thiệu', 'bodyClass' => 'about', 'roomCode' => '', 'langUrl' => '/about-us']);
});
Route::get('/about-us', function () {
    return view('en/about', ['headTitle' => 'About us', 'bodyClass' => 'about', 'roomCode' => '', 'langUrl' => '/gioi-thieu']);
});
Route::get('/lien-he', function () {
    return view('contact', ['headTitle' => 'Liên hệ', 'bodyClass' => 'contact', 'roomCode' => '', 'langUrl' => '/contact-us']);
});
Route::get('/contact-us', function () {
    return view('en/contact', ['headTitle' => 'Contact us', 'bodyClass' => 'contact', 'roomCode' => '', 'langUrl' => '/lien-he']);
});
Route::get('/danh-sach-phong', [
    "uses" => 'RoomController@index',
    "as" => 'index'
]);
Route::get('/rooms', [
    "uses" => 'RoomController@index_en',
    "as" => 'index_en'
]);
Route::get('/phong/{code}', function($code) {
  return view('roomHost', ['headTitle' => 'Đỏ - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/room/'.$code]);
});
Route::get('/phong/{code}/duoc-moi', function($code) {
  return view('roomGuest', ['headTitle' => 'Đen - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/room/'.$code.'/invited']);
});
Route::get('/phong/{code}/do', function($code) {
  return view('roomRed', ['headTitle' => 'Đỏ - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/room/'.$code.'/red']);
});
Route::get('/phong/{code}/den', function($code) {
  return view('roomBlack', ['headTitle' => 'Đen - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/room/'.$code.'/black']);
});

Route::get('/room/{code}', function($code) {
  return view('en/roomHost', ['headTitle' => 'Red - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/phong/'.$code]);
});
Route::get('/room/{code}/invited', function($code) {
  return view('en/roomGuest', ['headTitle' => 'Black - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/phong/'.$code.'/duoc-moi']);
});
Route::get('/room/{code}/red', function($code) {
  return view('en/roomRed', ['headTitle' => 'Red - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/phong/'.$code.'/do']);
});
Route::get('/room/{code}/black', function($code) {
  return view('en/roomBlack', ['headTitle' => 'Black - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => '/phong/'.$code.'/den']);
});
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
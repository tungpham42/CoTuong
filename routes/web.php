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

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::post('/', ['middleware' => 'csrf', 'uses' => 'SignedRequestController@auth']);
Route::get('/', function () {
    return view('human', ['headTitle' => 'Chơi với nhau', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/en']);
});
Route::get('/en', function () {
    return view('en/human', ['headTitle' => 'Play with friend', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/']);
});
Route::get('/choi-voi-may', function () {
  return view('ai', ['headTitle' => 'Chơi với máy', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai', 'level' => '3', 'levelTxt' => 'Bình thường']);
});
Route::get('/choi-voi-may/de-nhat', function () {
  return view('ai', ['headTitle' => 'Chơi với máy - Dễ nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai/easiest', 'level' => '1', 'levelTxt' => 'Dễ nhất']);
});
Route::get('/choi-voi-may/de', function () {
  return view('ai', ['headTitle' => 'Chơi với máy - Dễ', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai/easy', 'level' => '2', 'levelTxt' => 'Dễ']);
});
Route::get('/choi-voi-may/binh-thuong', function () {
  return view('ai', ['headTitle' => 'Chơi với máy - Bình thường', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai/normal', 'level' => '3', 'levelTxt' => 'Bình thường']);
});
Route::get('/choi-voi-may/kho', function () {
  return view('ai', ['headTitle' => 'Chơi với máy - Khó', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai/hard', 'level' => '4', 'levelTxt' => 'Khó']);
});
Route::get('/choi-voi-may/kho-nhat', function () {
  return view('ai', ['headTitle' => 'Chơi với máy - Khó nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/play-with-ai/hardest', 'level' => '5', 'levelTxt' => 'Khó nhất']);
});
Route::get('/play-with-ai', function () {
  return view('en/ai', ['headTitle' => 'Play with AI', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may', 'level' => '3', 'levelTxt' => 'Normal']);
});
Route::get('/play-with-ai/easiest', function () {
  return view('en/ai', ['headTitle' => 'Play with AI - Easiest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may/de-nhat', 'level' => '1', 'levelTxt' => 'Easiest']);
});
Route::get('/play-with-ai/easy', function () {
  return view('en/ai', ['headTitle' => 'Play with AI - Easy', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may/de', 'level' => '2', 'levelTxt' => 'Easy']);
});
Route::get('/play-with-ai/normal', function () {
  return view('en/ai', ['headTitle' => 'Play with AI - Normal', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may/binh-thuong', 'level' => '3', 'levelTxt' => 'Normal']);
});
Route::get('/play-with-ai/hard', function () {
  return view('en/ai', ['headTitle' => 'Play with AI - Hard', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may/kho', 'level' => '4', 'levelTxt' => 'Hard']);
});
Route::get('/play-with-ai/hardest', function () {
  return view('en/ai', ['headTitle' => 'Play with AI - Hardest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/choi-voi-may/kho-nhat', 'level' => '5', 'levelTxt' => 'Hardest']);
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
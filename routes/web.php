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
Route::get('/choi-voi-nhau', function () {
    return view('human', ['headTitle' => 'Chơi với nhau', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/en']);
});
Route::get('/play-with-friend', function () {
    return view('en/human', ['headTitle' => 'Play with friend', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/']);
});
Route::get('/', function () {
  return view('ai', ['headTitle' => 'Chơi', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/en', 'level' => '3', 'levelTxt' => 'Bình thường']);
});
Route::get('/de-nhat', function () {
  return view('ai', ['headTitle' => 'Chơi - Dễ nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/easiest', 'level' => '1', 'levelTxt' => 'Dễ nhất']);
});
Route::get('/moi-choi', function () {
    return view('ai', ['headTitle' => 'Chơi - Mới chơi', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/newbie', 'level' => '1', 'levelTxt' => 'Mới chơi']);
});
Route::get('/de', function () {
  return view('ai', ['headTitle' => 'Chơi - Dễ', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/easy', 'level' => '2', 'levelTxt' => 'Dễ']);
});
Route::get('/binh-thuong', function () {
  return view('ai', ['headTitle' => 'Chơi - Bình thường', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/normal', 'level' => '3', 'levelTxt' => 'Bình thường']);
});
Route::get('/kho', function () {
  return view('ai', ['headTitle' => 'Chơi - Khó', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/hard', 'level' => '4', 'levelTxt' => 'Khó']);
});
Route::get('/kho-nhat', function () {
  return view('ai', ['headTitle' => 'Chơi - Khó nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/hardest', 'level' => '5', 'levelTxt' => 'Khó nhất']);
});
Route::get('/choi-voi-may', function () {
  return redirect('/');
});
Route::get('/choi-voi-may/de-nhat', function () {
  return redirect('/de-nhat',);
});
Route::get('/choi-voi-may/moi-choi', function () {
  return redirect('/moi-choi',);
});
Route::get('/choi-voi-may/de', function () {
  return redirect('/de');
});
Route::get('/choi-voi-may/binh-thuong', function () {
  return redirect('/binh-thuong');
});
Route::get('/choi-voi-may/kho', function () {
  return redirect('/kho');
});
Route::get('/choi-voi-may/kho-nhat', function () {
  return redirect('/kho-nhat');
});

Route::get('/en', function () {
  return view('en/ai', ['headTitle' => 'Play', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/', 'level' => '3', 'levelTxt' => 'Normal']);
});
Route::get('/easiest', function () {
  return view('en/ai', ['headTitle' => 'Play - Easiest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/de-nhat', 'level' => '1', 'levelTxt' => 'Easiest']);
});
Route::get('/newbie', function () {
    return view('en/ai', ['headTitle' => 'Play - Newbie', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/moi-choi', 'level' => '1', 'levelTxt' => 'Newbie']);
});
Route::get('/easy', function () {
  return view('en/ai', ['headTitle' => 'Play - Easy', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/de', 'level' => '2', 'levelTxt' => 'Easy']);
});
Route::get('/normal', function () {
  return view('en/ai', ['headTitle' => 'Play - Normal', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/binh-thuong', 'level' => '3', 'levelTxt' => 'Normal']);
});
Route::get('/hard', function () {
  return view('en/ai', ['headTitle' => 'Play - Hard', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/kho', 'level' => '4', 'levelTxt' => 'Hard']);
});
Route::get('/hardest', function () {
  return view('en/ai', ['headTitle' => 'Play - Hardest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => '/kho-nhat', 'level' => '5', 'levelTxt' => 'Hardest']);
});
Route::get('/play-with-ai', function () {
  return redirect('/en');
});
Route::get('/play-with-ai/easiest', function () {
  return redirect('/easiest');
});
Route::get('/play-with-ai/newbie', function () {
  return redirect('/newbie');
});
Route::get('/play-with-ai/easy', function () {
  return redirect('/easy');
});
Route::get('/play-with-ai/normal', function () {
  return redirect('/normal');
});
Route::get('/play-with-ai/hard', function () {
  return redirect('/hard');
});
Route::get('/play-with-ai/hardest', function () {
  return redirect('/hardest');
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
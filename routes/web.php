<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    return view(Controller::getView('human'), ['headTitle' => 'Chơi với nhau', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/play-with-friend'), 'canonicalUrl' => '/choi-voi-nhau']);
});
Route::get('/play-with-friend', function () {
    return view(Controller::getView('en/human'), ['headTitle' => 'Play with friend', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/choi-voi-nhau'), 'canonicalUrl' => '/play-with-friend']);
});

Route::get('/co-the', function () {
  return view(Controller::getView('setup'), ['headTitle' => 'Xếp bàn cờ thế', 'bodyClass' => 'setup', 'roomCode' => '', 'langUrl' => Controller::getUrl('/set-up'), 'canonicalUrl' => '/co-the']);
});
Route::get('/set-up', function () {
  return view(Controller::getView('en/setup'), ['headTitle' => 'Set up the board', 'bodyClass' => 'setup', 'roomCode' => '', 'langUrl' => Controller::getUrl('/co-the'), 'canonicalUrl' => '/set-up']);
});

Route::get('/chia-se/{fen}', function ($fen) {
  return view(Controller::getView('share'), ['headTitle' => 'Chia sẻ bàn cờ', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'langUrl' => Controller::getUrl('/share/'.$fen), 'canonicalUrl' => '/chia-se/'.$fen]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);
Route::get('/share/{fen}', function ($fen) {
    return view(Controller::getView('en/share'), ['headTitle' => 'Share board', 'bodyClass' => 'home', 'fen' => $fen, 'roomCode' => '', 'langUrl' => Controller::getUrl('/chia-se/'.$fen), 'canonicalUrl' => '/share/'.$fen]);
})->where(['fen' => "[a-zA-Z0-9\-\/\s|&nbsp;]+"]);

Route::get('/', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Trang chủ', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/en'), 'level' => '3', 'levelTxt' => 'Bình thường', 'canonicalUrl' => '/']);
});
Route::get('/de-nhat', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Dễ nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/easiest'), 'level' => '1', 'levelTxt' => 'Dễ nhất', 'canonicalUrl' => '/de-nhat']);
});
Route::get('/moi-choi', function () {
    return view(Controller::getView('ai'), ['headTitle' => 'Mới chơi', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/newbie'), 'level' => '1', 'levelTxt' => 'Mới chơi', 'canonicalUrl' => '/moi-choi']);
});
Route::get('/de', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Dễ', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/easy'), 'level' => '2', 'levelTxt' => 'Dễ', 'canonicalUrl' => '/de']);
});
Route::get('/binh-thuong', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Bình thường', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/normal'), 'level' => '3', 'levelTxt' => 'Bình thường', 'canonicalUrl' => '/binh-thuong']);
});
Route::get('/kho', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Khó', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/hard'), 'level' => '4', 'levelTxt' => 'Khó', 'canonicalUrl' => '/kho']);
});
Route::get('/kho-nhat', function () {
  return view(Controller::getView('ai'), ['headTitle' => 'Khó nhất', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/hardest'), 'level' => '5', 'levelTxt' => 'Khó nhất', 'canonicalUrl' => '/kho-nhat']);
});
Route::get('/choi-co-tuong', function () {
  return redirect('/', 301);
});
Route::get('/choi-voi-may', function () {
  return redirect('/', 301);
});
Route::get('/choi-voi-may/de-nhat', function () {
  return redirect('/de-nhat', 301);
});
Route::get('/choi-voi-may/moi-choi', function () {
  return redirect('/moi-choi', 301);
});
Route::get('/choi-voi-may/de', function () {
  return redirect('/de', 301);
});
Route::get('/choi-voi-may/binh-thuong', function () {
  return redirect('/binh-thuong', 301);
});
Route::get('/choi-voi-may/kho', function () {
  return redirect('/kho', 301);
});
Route::get('/choi-voi-may/kho-nhat', function () {
  return redirect('/kho-nhat', 301);
});

Route::get('/en', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Home', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/'), 'level' => '3', 'levelTxt' => 'Normal', 'canonicalUrl' => '/en']);
});
Route::get('/easiest', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Easiest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/de-nhat'), 'level' => '1', 'levelTxt' => 'Easiest', 'canonicalUrl' => '/easiest']);
});
Route::get('/newbie', function () {
    return view(Controller::getView('en/ai'), ['headTitle' => 'Newbie', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/moi-choi'), 'level' => '1', 'levelTxt' => 'Newbie', 'canonicalUrl' => '/newbie']);
});
Route::get('/easy', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Easy', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/de'), 'level' => '2', 'levelTxt' => 'Easy', 'canonicalUrl' => '/easy']);
});
Route::get('/normal', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Normal', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/binh-thuong'), 'level' => '3', 'levelTxt' => 'Normal', 'canonicalUrl' => '/normal']);
});
Route::get('/hard', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Hard', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/kho'), 'level' => '4', 'levelTxt' => 'Hard', 'canonicalUrl' => '/hard']);
});
Route::get('/hardest', function () {
  return view(Controller::getView('en/ai'), ['headTitle' => 'Hardest', 'bodyClass' => 'home', 'roomCode' => '', 'langUrl' => Controller::getUrl('/kho-nhat'), 'level' => '5', 'levelTxt' => 'Hardest', 'canonicalUrl' => '/hardest']);
});
Route::get('/play-with-ai', function () {
  return redirect('/en', 301);
});
Route::get('/play-with-ai/easiest', function () {
  return redirect('/easiest', 301);
});
Route::get('/play-with-ai/newbie', function () {
  return redirect('/newbie', 301);
});
Route::get('/play-with-ai/easy', function () {
  return redirect('/easy', 301);
});
Route::get('/play-with-ai/normal', function () {
  return redirect('/normal', 301);
});
Route::get('/play-with-ai/hard', function () {
  return redirect('/hard', 301);
});
Route::get('/play-with-ai/hardest', function () {
  return redirect('/hardest', 301);
});

Route::get('/gioi-thieu', function () {
    return view(Controller::getView('about'), ['headTitle' => 'Giới thiệu', 'bodyClass' => 'about', 'roomCode' => '', 'langUrl' => Controller::getUrl('/about-us'), 'canonicalUrl' => '/gioi-thieu']);
});
Route::get('/about-us', function () {
    return view(Controller::getView('en/about'), ['headTitle' => 'About us', 'bodyClass' => 'about', 'roomCode' => '', 'langUrl' => Controller::getUrl('/gioi-thieu'), 'canonicalUrl' => '/about-us']);
});
Route::get('/lien-he', function () {
    return view(Controller::getView('contact'), ['headTitle' => 'Liên hệ', 'bodyClass' => 'contact', 'roomCode' => '', 'langUrl' => Controller::getUrl('/contact-us'), 'canonicalUrl' => '/lien-he']);
});
Route::get('/contact-us', function () {
    return view(Controller::getView('en/contact'), ['headTitle' => 'Contact us', 'bodyClass' => 'contact', 'roomCode' => '', 'langUrl' => Controller::getUrl('/lien-he'), 'canonicalUrl' => '/contact-us']);
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
  return view(Controller::getView('roomHost'), ['headTitle' => 'Chủ phòng - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code), 'canonicalUrl' => '/phong/'.$code]);
});
Route::get('/phong/{code}/duoc-moi', function($code) {
  return view(Controller::getView('roomGuest'), ['headTitle' => 'Khách - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code.'/invited'), 'canonicalUrl' => '/phong/'.$code.'/duoc-moi']);
});
Route::get('/phong/{code}/do', function($code) {
  return view(Controller::getView('roomRed'), ['headTitle' => 'Bên đỏ - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code.'/red'), 'canonicalUrl' => '/phong/'.$code.'/do']);
});
Route::get('/phong/{code}/den', function($code) {
  return view(Controller::getView('roomBlack'), ['headTitle' => 'Bên đen - Phòng: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/room/'.$code.'/black'), 'canonicalUrl' => '/phong/'.$code.'/den']);
});

Route::get('/room/{code}', function($code) {
  return view(Controller::getView('en/roomHost'), ['headTitle' => 'Host - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code), 'canonicalUrl' => '/room/'.$code]);
});
Route::get('/room/{code}/invited', function($code) {
  return view(Controller::getView('en/roomGuest'), ['headTitle' => 'Guest - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code.'/duoc-moi'), 'canonicalUrl' => '/room/'.$code.'/invited']);
});
Route::get('/room/{code}/red', function($code) {
  return view(Controller::getView('en/roomRed'), ['headTitle' => 'Red side - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code.'/do'), 'canonicalUrl' => '/room/'.$code.'/red']);
});
Route::get('/room/{code}/black', function($code) {
  return view(Controller::getView('en/roomBlack'), ['headTitle' => 'Black side - Room: '.$code, 'bodyClass' => 'room', 'roomCode' => $code, 'langUrl' => Controller::getUrl('/phong/'.$code.'/den'), 'canonicalUrl' => '/room/'.$code.'/black']);
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
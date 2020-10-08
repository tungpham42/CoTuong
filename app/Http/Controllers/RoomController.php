<?php

namespace App\Http\Controllers;

use DB;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        return view($this->getView('roomList'), ['headTitle' => 'Danh sách phòng', 'bodyClass' => 'room', 'rooms' => Room::all(), 'newBadge' => '&nbsp;<span class="badge badge-danger">MỚI</span>', 'roomCode' => '', 'langUrl' => $this->getUrl('/rooms'), 'canonicalUrl' => '/danh-sach-phong']);
    }
    public function index_en()
    {
        $rooms = DB::table('rooms')->get();
        return view($this->getView('en/roomList'), ['headTitle' => 'Rooms', 'bodyClass' => 'room', 'rooms' => Room::all(), 'roomCode' => '', 'langUrl' => $this->getUrl('/danh-sach-phong'), 'canonicalUrl' => '/rooms']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $code = $request->input('ma-phong');
        $fen = $request->input('FEN');
        $pass = $request->input('pass');
        DB::table('rooms')
            ->updateOrInsert(
            ['code' => $code],
            ['fen' => $fen, 'pass' => $pass, 'modified_at' => time()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = $request->input('ma-phong');
        $fen = $request->input('FEN');
        DB::table('rooms')
            ->updateOrInsert(
            ['code' => $code],
            ['fen' => $fen, 'modified_at' => time()]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room, $code)
    {
        $fenJson = DB::table('rooms')
                ->select('fen')
                ->where('code', '=', $code)
                ->get();
        $fen = json_decode($fenJson, true);
        return $fen[0]['fen'];
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function getPass(Room $room, $code)
    {
        $passJson = DB::table('rooms')
                ->select('pass')
                ->where('code', '=', $code)
                ->get();
        $pass = json_decode($passJson, true);
        return $pass[0]['pass'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function changePass(Request $request, Room $room)
    {
        $code = $request->input('ma-phong');
        $pass = $request->input('pass');
        if (!$request->input('pass') || $pass === '') {
            echo json_encode(array('message' => 'Password cannot be empty', 'code' => 0));
            exit();
        } else {
            DB::update('update rooms set pass = ? where code = ?', [$pass, $code]);
            echo json_encode(array('message' => 'Changed password successfully!', 'code' => 1));
            exit();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function doiPass(Request $request, Room $room)
    {
        $code = $request->input('ma-phong');
        $pass = $request->input('pass');
        if (!$request->input('pass') || $pass === '') {
            echo json_encode(array('message' => 'Mật khẩu không được để trống', 'code' => 0));
            exit();
        } else {
            DB::update('update rooms set pass = ? where code = ?', [$pass, $code]);
            echo json_encode(array('message' => 'Đổi mật khẩu thành công!', 'code' => 1));
            exit();
        }
    }

    public function getEventStream(Room $room, $code) {
        $fenJson = DB::table('rooms')
                    ->select('fen')
                    ->where('code', '=', $code)
                    ->get();
        $fen = json_decode($fenJson, true)[0]['fen'];

        $response = new StreamedResponse();
        $response->setCallback(function () use ($fen){

            echo 'data: ' . $fen . "\n\n";
            //echo "retry: 100\n\n"; // no retry would default to 3 seconds.
            //echo "data: Hello There\n\n";
            ob_flush();
            flush();
            //sleep(1);
            usleep(200000);
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        $response->send();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}

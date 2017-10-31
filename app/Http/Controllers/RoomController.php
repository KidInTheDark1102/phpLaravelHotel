<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room as Room;
use App\Client as Client;

class RoomController extends Controller
{
    function __construct(Room $room,Client $client){
        $this->room = $room;
        $this->client = $client;
    }

    public function checkAvailableRooms($client_id, Request $request){
        $start_date  = $request->input('start_date');
        $end_date = $request->input('end_date');

        $data = [];
        $data['$rooms'] = $rooms->getAvailableRoom(start_date,end_date);
        
        return view('rooms/checkAvailableRooms',$data);
    }
}

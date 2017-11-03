<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room as Room;
use App\Client as Client;

class RoomController extends Controller
{
    function __construct(Room $room, Client $client){
        $this->room = $room;
        $this->client = $client;
   }

   public function checkAvailableRooms($client_id, Request $request){
        $start_date = $request->input('dateFrom');
        $end_date = $request->input('dateTo');
            
        $foundClient = $this->client->find($client_id);
        $data = [];
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['client'] = $foundClient;
        $data['rooms'] = $this->room->getAvailableRooms($start_date,$end_date);

        if($request->isMethod('post')){
            // dd($data['rooms']);
        }
        return view('rooms/checkAvailableRooms', $data);
   }
}

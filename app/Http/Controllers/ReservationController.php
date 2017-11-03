<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room as Room;
use App\Client as Client;
use App\Reservation as Reservation;

class ReservationController extends Controller
{
    function __construct(Room $room, Client $client, Reservation $reservation){
        $this->room = $room;
        $this->client = $client;
        $this->reservation = $reservation;

    }

    public function bookRoom($client_id, $room_id, $start_date, $end_date){
        $foundClient = $this->client->find($client_id);
        $foundRoom = $this->room->find($room_id);
        $reservation = $this->reservation;

        $reservation->date_in = $start_date;
        $reservation->date_out = $end_date;

        $reservation->room()->associate($foundRoom);
        $reservation->client()->associate($foundClient);
        if($this->room->isBookedRoom($room_id,$start_date,$end_date))
        {
            abort(405,"Someone has booked this room");
        }
        $reservation->save();
        return redirect("clients");
        // return view('reservations/bookRoom');
    }

    
}
